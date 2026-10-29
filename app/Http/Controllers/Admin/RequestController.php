<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceInquiry;
use App\Models\SupplierSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class RequestController extends Controller
{
    private const STATUSES = [
        'new',
        'in_progress',
        'follow_up',
        'closed',
    ];

    public function index(Request $request)
    {
        $type = $request->query('type', 'all');
        $status = $request->query('status');
        $search = trim((string) $request->query('search', ''));
        $dateFrom = $request->query('date_from');
        $dateTo = $request->query('date_to');
        $archived = $request->boolean('archived');

        abort_unless(
            in_array($type, ['all', 'price', 'supplier'], true),
            404
        );

        if ($status !== null) {
            abort_unless(
                in_array($status, self::STATUSES, true),
                404
            );
        }

        $requests = collect();

        if (in_array($type, ['all', 'price'], true)) {
            $query = PriceInquiry::query()
                ->with('items.product')
                ->when(
                    $archived,
                    fn ($q) => $q->whereNotNull('archived_at'),
                    fn ($q) => $q->whereNull('archived_at')
                );

            $this->applyFilters(
                $query,
                $search,
                $status,
                $dateFrom,
                $dateTo,
                ['name', 'company', 'email', 'phone', 'destination']
            );

            $requests = $requests->concat(
                $query->get()->map(function ($item) {
                    $item->request_type = 'price';
                    $item->request_label = 'استعلام قیمت';
                    $item->request_name = $item->name;
                    $item->request_contact = $item->email ?: $item->phone;
                    return $item;
                })
            );
        }

        if (in_array($type, ['all', 'supplier'], true)) {
            $query = SupplierSubmission::query()
                ->when(
                    $archived,
                    fn ($q) => $q->whereNotNull('archived_at'),
                    fn ($q) => $q->whereNull('archived_at')
                );

            $this->applyFilters(
                $query,
                $search,
                $status,
                $dateFrom,
                $dateTo,
                ['name', 'mobile', 'whatsapp', 'city', 'province', 'product']
            );

            $requests = $requests->concat(
                $query->get()->map(function ($item) {
                    $item->request_type = 'supplier';
                    $item->request_label = 'درخواست همکاری';
                    $item->request_name = $item->name;
                    $item->request_contact = $item->mobile;
                    return $item;
                })
            );
        }

        $requests = $requests
            ->sortByDesc('created_at')
            ->values();

        $perPage = 15;
        $page = max(1, (int) $request->query('page', 1));

        $items = $requests->forPage($page, $perPage);

        $requests = new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $requests->count(),
            $perPage,
            $page,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        $newPriceCount = PriceInquiry::whereNull('reviewed_at')
            ->whereNull('archived_at')
            ->count();

        $newSupplierCount = SupplierSubmission::whereNull('reviewed_at')
            ->whereNull('archived_at')
            ->count();

        return view('admin.Request.index', compact(
            'requests',
            'type',
            'status',
            'search',
            'dateFrom',
            'dateTo',
            'archived',
            'newPriceCount',
            'newSupplierCount'
        ));
    }

    private function applyFilters(
        $query,
        string $search,
        ?string $status,
        ?string $dateFrom,
        ?string $dateTo,
        array $searchColumns
    ): void {
        if ($status !== null) {
            $query->where('status', $status);
        }

        if ($search !== '') {
            $query->where(function ($subQuery) use ($search, $searchColumns) {
                foreach ($searchColumns as $column) {
                    $subQuery->orWhere($column, 'like', "%{$search}%");
                }
            });
        }

        if ($dateFrom) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }

        if ($dateTo) {
            $query->whereDate('created_at', '<=', $dateTo);
        }
    }

    private function findRequest(string $type, int $id)
    {
        return match ($type) {
            'price' => PriceInquiry::with('items.product')->findOrFail($id),
            'supplier' => SupplierSubmission::findOrFail($id),
            default => abort(404),
        };
    }

    public function show(string $type, int $id)
    {
        $item = $this->findRequest($type, $id);

        return view('admin.Request.show', compact('item', 'type'));
    }

    public function review(string $type, int $id)
    {
        $item = $this->findRequest($type, $id);

        $item->forceFill([
            'reviewed_at' => now(),
        ])->save();

        return back()->with('success', 'درخواست به‌عنوان بررسی‌شده علامت‌گذاری شد.');
    }

    public function updateStatus(Request $request, string $type, int $id)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(self::STATUSES)],
        ]);

        $item = $this->findRequest($type, $id);
        $item->update(['status' => $validated['status']]);

        return back()->with('success', 'وضعیت درخواست تغییر کرد.');
    }

    public function archive(string $type, int $id)
    {
        $item = $this->findRequest($type, $id);

        $item->forceFill(['archived_at' => now()])->save();

        return redirect()
            ->route('admin.Request')
            ->with('success', 'درخواست بایگانی شد.');
    }

    public function unarchive(string $type, int $id)
    {
        $item = $this->findRequest($type, $id);

        $item->forceFill(['archived_at' => null])->save();

        return back()->with('success', 'درخواست از بایگانی خارج شد.');
    }

    public function destroy(string $type, int $id)
    {
        $item = $this->findRequest($type, $id);
        $item->delete();

        return back()->with('success', 'درخواست به سطل زباله منتقل شد.');
    }

    public function trash(Request $request)
    {
        $priceRequests = PriceInquiry::onlyTrashed()
            ->latest()
            ->get()
            ->map(function ($item) {
                $item->request_type = 'price';
                $item->request_label = 'استعلام قیمت';
                $item->request_name = $item->name;
                return $item;
            });

        $supplierRequests = SupplierSubmission::onlyTrashed()
            ->latest()
            ->get()
            ->map(function ($item) {
                $item->request_type = 'supplier';
                $item->request_label = 'درخواست همکاری';
                $item->request_name = $item->name;
                return $item;
            });

        $requests = $priceRequests
            ->concat($supplierRequests)
            ->sortByDesc('created_at')
            ->values();

        return view('admin.Request.trash', compact('requests'));
    }

    public function restore(string $type, int $id)
    {
        $model = match ($type) {
            'price' => PriceInquiry::onlyTrashed()->findOrFail($id),
            'supplier' => SupplierSubmission::onlyTrashed()->findOrFail($id),
            default => abort(404),
        };

        $model->restore();

        return back()->with('success', 'درخواست بازیابی شد.');
    }

    public function forceDelete(string $type, int $id)
    {
        $model = match ($type) {
            'price' => PriceInquiry::onlyTrashed()->findOrFail($id),
            'supplier' => SupplierSubmission::onlyTrashed()->findOrFail($id),
            default => abort(404),
        };

        DB::transaction(function () use ($model, $type) {
            if ($type === 'price') {
                $model->items()->delete();
            }

            $model->forceDelete();
        });

        return back()->with('success', 'درخواست برای همیشه حذف شد.');
    }
}
