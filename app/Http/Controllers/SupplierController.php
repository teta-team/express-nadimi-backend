<?php

namespace App\Http\Controllers;

use App\Models\SupplierSubmission;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function store(Request $request)
    {
        $locale = $request->segment(1);
        app()->setLocale(in_array($locale, ['en', 'fa', 'ar'], true) ? $locale : 'en');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|regex:/^[0-9\+\-\s\(\)]+$/',
            'whatsapp' => 'nullable|string|regex:/^[0-9\+\-\s\(\)]+$/',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'role' => 'required|in:farmer,orchard,greenhouse,producer,cold_storage,wholesaler,company,other',
            'product' => 'required|string|max:255',
            'variety' => 'nullable|string|max:255',
            'origin' => 'required|string|max:255',
            'quantity_tons' => 'required|numeric|min:0.1',
            'frequency' => 'nullable|in:single,daily,weekly,monthly,season',
            'capacity' => 'nullable|string|max:255',
            'ready_from' => 'required|date',
            'ready_until' => 'nullable|date|after_or_equal:ready_from',
            'grade' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'sorted' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'visit' => 'nullable|string|max:255',
            'packing' => 'nullable|string|max:255',
            'pack_weight' => 'nullable|numeric|min:0',
            'custom_pack' => 'nullable|string|max:255',
            'change_pack' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'payment_terms' => 'nullable|string|max:255',
            'price_terms' => 'nullable|string|max:255',
            'years' => 'nullable|numeric|min:0|max:100',
            'export_history' => 'nullable|string|max:255',
            'export_markets' => 'nullable|string|max:255',
            'long_term' => 'nullable|string|max:255',
            'photos' => 'nullable|array|max:8',
            'photos.*' => 'image|mimes:jpeg,png,webp|max:8192',
            'packaging_photos' => 'nullable|array|max:8',
            'packaging_photos.*' => 'image|mimes:jpeg,png,webp|max:8192',
            'video' => 'nullable|file|mimes:mp4,mov,webm|max:51200',
            'notes' => 'nullable|string|max:4000',
            'confirm' => 'required|accepted',
        ]);

        $data = collect($validated)->except([
            'confirm',
            'photos',
            'packaging_photos',
            'video',
        ])->all();

        $data['change_pack'] = match ($request->input('change_pack')) {
            'yes' => true,
            'no' => false,
            default => null,
        };

        $data['photos'] = $this->storeFiles($request, 'photos');
        $data['packaging_photos'] = $this->storeFiles($request, 'packaging_photos');
        $data['video'] = $request->hasFile('video')
            ? $request->file('video')->store('supplier/videos', 'public')
            : null;

        SupplierSubmission::create($data);

        return redirect()
            ->back()
            ->with('success', match ($request->segment(1)) {
                'fa' => 'فرم شما با موفقیت ثبت شد. کارشناسان ما به‌زودی با شما تماس می‌گیرند.',
                'ar' => 'تم استلام نموذجكم بنجاح. سيتواصل معكم فريقنا قريباً.',
                default => 'Your submission has been received. Our team will contact you soon.',
            });
    }

    /**
     * @return array<int, string>|null
     */
    private function storeFiles(Request $request, string $field): ?array
    {
        if (! $request->hasFile($field)) {
            return null;
        }

        $files = $request->file($field);
        $files = is_array($files) ? $files : [$files];

        return collect($files)
            ->map(fn ($file) => $file->store('supplier/'.$field, 'public'))
            ->all();
    }
}
