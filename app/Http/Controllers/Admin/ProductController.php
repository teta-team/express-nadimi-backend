<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(8)
            ->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->validationRules());

        $imageUrl = $this->storeImage($request);

        if ($request->hasFile('image') && $imageUrl === null) {
            return back()
                ->withInput()
                ->withErrors([
                    'image' => 'آپلود یا پردازش تصویر ناموفق بود.',
                ]);
        }

        try {
            DB::transaction(function () use ($validated, $request, $imageUrl) {
                $faName = $validated['name']['fa'];
                $enName = $validated['name']['en'] ?? null;
                $arName = $validated['name']['ar'] ?? null;

                $slug = $this->generateUniqueSlug($enName ?: $faName);

                $sizeTranslations = $this->normalizeTranslations(
                    $validated['size_translations'] ?? [],
                    $validated['size'] ?? null
                );

                $packagingTranslations = $this->normalizeTranslations(
                    $validated['packaging_translations'] ?? [],
                    $validated['packaging'] ?? null
                );

                $minOrderTranslations = $this->normalizeTranslations(
                    $validated['min_order_translations'] ?? [],
                    $validated['min_order'] ?? null
                );

                Product::create([
                    'slug' => $slug,

                    'name' => [
                        'fa' => $faName,
                        'en' => $enName,
                        'ar' => $arName,
                    ],

                    'category' => $validated['category'] ?? null,
                    'status' => $validated['status'] ?? 'available',

                    'summary' => [
                        'fa' => $validated['summary']['fa'] ?? null,
                        'en' => $validated['summary']['en'] ?? null,
                        'ar' => $validated['summary']['ar'] ?? null,
                    ],

                    // Legacy fields remain available for older views and code.
                    'size' => $sizeTranslations['fa'],
                    'packaging' => $packagingTranslations['fa'],
                    'min_order' => $minOrderTranslations['fa'],

                    'size_translations' => $sizeTranslations,
                    'packaging_translations' => $packagingTranslations,
                    'min_order_translations' => $minOrderTranslations,

                    'months' => $this->normalizeMonths($request),

                    'image' => $imageUrl,
                    'hidden' => $request->boolean('hidden'),
                    'sort_order' => (Product::max('sort_order') ?? 0) + 1,
                ]);
            });
        } catch (Throwable $exception) {
            // Avoid leaving an uploaded image behind if database persistence fails.
            $this->deleteManagedImage($imageUrl);

            report($exception);

            return back()
                ->withInput()
                ->withErrors([
                    'product' => 'ذخیره محصول ناموفق بود. لطفاً خطا را بررسی و دوباره تلاش کن.',
                ]);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'محصول با موفقیت اضافه شد.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate($this->validationRules());

        $oldImageUrl = $product->image;
        $newImageUrl = $oldImageUrl;
        $uploadedNewImage = false;

        if ($request->hasFile('image')) {
            $newImageUrl = $this->storeImage($request);

            if ($newImageUrl === null) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'image' => 'آپلود یا پردازش تصویر ناموفق بود.',
                    ]);
            }

            $uploadedNewImage = true;
        }

        try {
            DB::transaction(function () use (
                $validated,
                $request,
                $product,
                $newImageUrl
            ) {
                $sizeTranslations = $this->normalizeTranslations(
                    $validated['size_translations'] ?? [],
                    $validated['size'] ?? $product->size
                );

                $packagingTranslations = $this->normalizeTranslations(
                    $validated['packaging_translations'] ?? [],
                    $validated['packaging'] ?? $product->packaging
                );

                $minOrderTranslations = $this->normalizeTranslations(
                    $validated['min_order_translations'] ?? [],
                    $validated['min_order'] ?? $product->min_order
                );

                $product->update([
                    'name' => [
                        'fa' => $validated['name']['fa'],
                        'en' => $validated['name']['en'] ?? null,
                        'ar' => $validated['name']['ar'] ?? null,
                    ],

                    'category' => $validated['category'] ?? null,
                    'status' => $validated['status'] ?? 'available',

                    'summary' => [
                        'fa' => $validated['summary']['fa'] ?? null,
                        'en' => $validated['summary']['en'] ?? null,
                        'ar' => $validated['summary']['ar'] ?? null,
                    ],

                    // Keep legacy columns synchronized with Persian values.
                    'size' => $sizeTranslations['fa'],
                    'packaging' => $packagingTranslations['fa'],
                    'min_order' => $minOrderTranslations['fa'],

                    'size_translations' => $sizeTranslations,
                    'packaging_translations' => $packagingTranslations,
                    'min_order_translations' => $minOrderTranslations,

                    'months' => $this->normalizeMonths(
                        $request,
                        $product->months
                    ),

                    'image' => $newImageUrl,
                    'hidden' => $request->boolean('hidden'),
                ]);
            });
        } catch (Throwable $exception) {
            // The old image remains untouched if the update fails.
            if ($uploadedNewImage) {
                $this->deleteManagedImage($newImageUrl);
            }

            report($exception);

            return back()
                ->withInput()
                ->withErrors([
                    'product' => 'به‌روزرسانی محصول ناموفق بود. لطفاً خطا را بررسی و دوباره تلاش کن.',
                ]);
        }

        // Delete the previous image only after the database update succeeds.
        if ($uploadedNewImage && $oldImageUrl !== $newImageUrl) {
            $this->deleteManagedImage($oldImageUrl);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'محصول با موفقیت به‌روزرسانی شد.');
    }

// داخل کلاس ProductController:
    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'محصول با موفقیت به سطل زباله منتقل شد.');
        } catch (Throwable $exception) {
            report($exception);

            return redirect()
                ->route('admin.products.index')
                ->withErrors([
                    'product' => 'حذف محصول ناموفق بود.',
                ]);
        }
    }

    public function restore(int $id)
    {
        try {
            $product = Product::onlyTrashed()->findOrFail($id);
            $product->restore();

            return redirect()
                ->route('admin.products.trash')
                ->with('success', 'محصول با موفقیت بازیابی شد.');
        } catch (\Illuminate\Database\QueryException $exception) {
            report($exception);

            return redirect()
                ->route('admin.products.trash')
                ->withErrors([
                    'product' => 'بازیابی محصول انجام نشد. ممکن است اسلاگ محصول با رکورد دیگری تداخل داشته باشد.',
                ]);
        } catch (Throwable $exception) {
            report($exception);

            return redirect()
                ->route('admin.products.trash')
                ->withErrors([
                    'product' => 'بازیابی محصول ناموفق بود.',
                ]);
        }

    }

    public function trash()
    {
        $products = Product::onlyTrashed()
            ->orderByDesc('deleted_at')
            ->paginate(8)
            ->withQueryString();

        return view('admin.products.trash', compact('products'));
    }

    public function forceDelete(int $id)
    {
        try {
            $product = Product::onlyTrashed()->findOrFail($id);
            $imageUrl = $product->image;

            $product->forceDelete();
        } catch (Throwable $exception) {
            report($exception);

            return redirect()
                ->route('admin.products.trash')
                ->withErrors([
                    'product' => 'حذف دائمی محصول ناموفق بود.',
                ]);
        }

        if ($imageUrl) {
            try {
                $this->deleteManagedImage($imageUrl);
            } catch (Throwable $exception) {
                report($exception);
            }
        }

        return redirect()
            ->route('admin.products.trash')
            ->with('success', 'محصول برای همیشه حذف شد.');

    }

    /**
     * Validation rules shared by store and update.
     */
    private function validationRules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.fa' => ['required', 'string', 'max:191'],
            'name.en' => ['nullable', 'string', 'max:191'],
            'name.ar' => ['nullable', 'string', 'max:191'],

            'category' => [
                'nullable',
                'in:vegetables,stone-fruits,orchard-fruits,citrus-melons',
            ],

            'status' => [
                'nullable',
                'in:available,off_season',
            ],

            'summary' => ['nullable', 'array'],
            'summary.fa' => ['nullable', 'string', 'max:10000'],
            'summary.en' => ['nullable', 'string', 'max:10000'],
            'summary.ar' => ['nullable', 'string', 'max:10000'],

            // Legacy single-language fields.
            'size' => ['nullable', 'string', 'max:255'],
            'packaging' => ['nullable', 'string', 'max:255'],
            'min_order' => ['nullable', 'string', 'max:255'],

            // Multilingual product attributes.
            'size_translations' => ['nullable', 'array'],
            'size_translations.fa' => ['nullable', 'string', 'max:255'],
            'size_translations.en' => ['nullable', 'string', 'max:255'],
            'size_translations.ar' => ['nullable', 'string', 'max:255'],

            'packaging_translations' => ['nullable', 'array'],
            'packaging_translations.fa' => ['nullable', 'string', 'max:255'],
            'packaging_translations.en' => ['nullable', 'string', 'max:255'],
            'packaging_translations.ar' => ['nullable', 'string', 'max:255'],

            'min_order_translations' => ['nullable', 'array'],
            'min_order_translations.fa' => ['nullable', 'string', 'max:255'],
            'min_order_translations.en' => ['nullable', 'string', 'max:255'],
            'min_order_translations.ar' => ['nullable', 'string', 'max:255'],

            // Harvest months: integers between 1 and 12.
            'months_submitted' => ['nullable', 'boolean'],
            'months' => ['nullable', 'array'],
            'months.*' => [
                'required',
                'integer',
                'between:1,12',
                'distinct',
            ],

            'hidden' => ['nullable', 'boolean'],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ];
    }

    /**
     * Generate a unique product slug.
     */
    private function generateUniqueSlug(string $source): string
    {
        $baseSlug = \Illuminate\Support\Str::slug($source);

        if ($baseSlug === '') {
            $baseSlug = 'product-' . \Illuminate\Support\Str::lower(
                    \Illuminate\Support\Str::random(8)
                );
        }

        $slug = $baseSlug;
        $counter = 1;

        while (Product::withTrashed()->where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }
    /**
     * Convert selected month numbers (1–12) into a 12-boolean array.
     *
     * If months_submitted exists, the submitted selection is authoritative.
     * An empty selection means all months are false.
     * If the field is absent during update, preserve existing months.
     */
    private function normalizeMonths(
        Request $request,
        mixed $existingMonths = null
    ): array {
        if (!$request->boolean('months_submitted')) {
            if (is_array($existingMonths)) {
                $existingMonths = array_slice($existingMonths, 0, 12);

                return array_values(
                    array_pad(
                        array_map(
                            fn ($value) => filter_var(
                                $value,
                                FILTER_VALIDATE_BOOLEAN
                            ),
                            $existingMonths
                        ),
                        12,
                        false
                    )
                );
            }

            return array_fill(0, 12, false);
        }

        $submittedMonths = $request->input('months', []);

        if (!is_array($submittedMonths)) {
            $submittedMonths = [];
        }

        $selectedMonths = collect($submittedMonths)
            ->map(fn ($month) => filter_var($month, FILTER_VALIDATE_INT))
            ->filter(fn ($month) => $month !== false && $month >= 1 && $month <= 12)
            ->unique()
            ->values()
            ->all();

        return array_map(
            fn ($month) => in_array($month, $selectedMonths, true),
            range(1, 12)
        );
    }
    /**
     * Normalize translations and use a legacy value as the Persian fallback.
     */
    private function normalizeTranslations(
        array $translations,
        ?string $legacyValue = null
    ): array {
        return [
            'fa' => $translations['fa'] ?? $legacyValue,
            'en' => $translations['en'] ?? null,
            'ar' => $translations['ar'] ?? null,
        ];
    }

    /**
     * Store an uploaded image on the public disk.
     *
     * Returns its public URL, or null when processing/storage fails.
     */
    private function storeImage(Request $request): ?string
    {
        if (! $request->hasFile('image')) {
            return null;
        }

        $file = $request->file('image');

        if (! $file || ! $file->isValid()) {
            return null;
        }

        try {
            $contents = file_get_contents($file->getRealPath());

            if ($contents === false) {
                return null;
            }

            $image = @imagecreatefromstring($contents);

            // If GD or WebP support is unavailable, store the validated original.
            if (! $image || ! function_exists('imagewebp')) {
                if ($image) {
                    imagedestroy($image);
                }

                $path = $file->store('products', 'public');

                return $path ? asset('storage/' . $path) : null;
            }

            $width = imagesx($image);
            $height = imagesy($image);
            $maxDimension = 1600;

            if ($width > $maxDimension || $height > $maxDimension) {
                $ratio = min(
                    $maxDimension / $width,
                    $maxDimension / $height
                );

                $newWidth = max(1, (int) round($width * $ratio));
                $newHeight = max(1, (int) round($height * $ratio));

                $resized = imagecreatetruecolor($newWidth, $newHeight);

                imagealphablending($resized, false);
                imagesavealpha($resized, true);

                imagecopyresampled(
                    $resized,
                    $image,
                    0,
                    0,
                    0,
                    0,
                    $newWidth,
                    $newHeight,
                    $width,
                    $height
                );

                imagedestroy($image);
                $image = $resized;
            }

            $filename = 'products/' . Str::uuid() . '.webp';

            ob_start();
            $success = imagewebp($image, null, 82);
            $webpContents = ob_get_clean();

            imagedestroy($image);

            if (
                ! $success
                || ! is_string($webpContents)
                || $webpContents === ''
            ) {
                return null;
            }

            if (! Storage::disk('public')->put($filename, $webpContents)) {
                return null;
            }

            return asset('storage/' . $filename);
        } catch (Throwable $exception) {
            report($exception);

            return null;
        }
    }

    /**
     * Delete an image only when its URL points to managed product storage.
     */
    private function deleteManagedImage(?string $imageUrl): void
    {
        if (! $imageUrl) {
            return;
        }

        $path = parse_url($imageUrl, PHP_URL_PATH);

        if (! is_string($path)) {
            return;
        }

        $prefix = '/storage/';

        if (! str_starts_with($path, $prefix)) {
            return;
        }

        $relativePath = substr($path, strlen($prefix));

        if (
            $relativePath === ''
            || str_contains($relativePath, '..')
            || ! str_starts_with($relativePath, 'products/')
        ) {
            return;
        }

        Storage::disk('public')->delete($relativePath);
    }
}
