<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ImageProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::orderBy('sort_order')->orderBy('id')->paginate(12);

        return view('panel.pages.products', compact('products'));
    }

    public function createProduct()
    {
        return view('panel.products.create');
    }

    public function storeProduct(Request $request, ImageProcessor $imageProcessor)
    {
        $data = $request->validate([
            'name.fa' => ['required', 'string', 'max:191'],
            'name.en' => ['nullable', 'string', 'max:191'],
            'name.ar' => ['nullable', 'string', 'max:191'],
            'category' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'in:available,off_season'],
            'summary.fa' => ['nullable', 'string'],
            'summary.en' => ['nullable', 'string'],
            'summary.ar' => ['nullable', 'string'],
            'size' => ['nullable', 'string', 'max:191'],
            'packaging' => ['nullable', 'string', 'max:191'],
            'min_order' => ['nullable', 'string', 'max:191'],
            'hidden' => ['nullable', 'boolean'],
            'image' => ['nullable'],
        ]);

        $name = [
            'fa' => $data['name']['fa'],
            'en' => $data['name']['en'] ?? null,
            'ar' => $data['name']['ar'] ?? null,
        ];
        $summary = [
            'fa' => $data['summary']['fa'] ?? null,
            'en' => $data['summary']['en'] ?? null,
            'ar' => $data['summary']['ar'] ?? null,
        ];

        $slug = Str::slug($name['en'] ?: $name['fa']);
        if ($slug === '') {
            $slug = 'product';
        }
        $baseSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$count++;
        }

        if ($request->hasFile('image')) {
            $imageUrl = $imageProcessor->storeImage($request->file('image'));
        } elseif (is_string($data['image'] ?? null) && str_starts_with($data['image'], 'data:image')) {
            $imageUrl = $imageProcessor->storeDataUrl($data['image']);
        } else {
            $imageUrl = null;
        }

        Product::create([
            'slug' => $slug,
            'name' => $name,
            'category' => $data['category'] ?? null,
            'status' => $data['status'] ?? 'available',
            'summary' => $summary,
            'size' => $data['size'] ?? null,
            'packaging' => $data['packaging'] ?? null,
            'min_order' => $data['min_order'] ?? null,
            'months' => array_fill(0, 12, true),
            'image' => $imageUrl,
            'hidden' => $request->boolean('hidden'),
            'sort_order' => 0,
        ]);

        return redirect()->route('panel.products')->with('success', 'محصول با موفقیت اضافه شد');
    }

    public function editProduct(Product $product)
    {
        return view('panel.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, Product $product, ImageProcessor $imageProcessor)
    {
        $data = $request->validate([
            'name.fa' => ['required', 'string', 'max:191'],
            'name.en' => ['nullable', 'string', 'max:191'],
            'name.ar' => ['nullable', 'string', 'max:191'],
            'category' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'in:available,off_season'],
            'summary.fa' => ['nullable', 'string'],
            'summary.en' => ['nullable', 'string'],
            'summary.ar' => ['nullable', 'string'],
            'size' => ['nullable', 'string', 'max:191'],
            'packaging' => ['nullable', 'string', 'max:191'],
            'min_order' => ['nullable', 'string', 'max:191'],
            'hidden' => ['nullable', 'boolean'],
            'image' => ['nullable'],
        ]);

        $name = [
            'fa' => $data['name']['fa'],
            'en' => $data['name']['en'] ?? null,
            'ar' => $data['name']['ar'] ?? null,
        ];
        $summary = [
            'fa' => $data['summary']['fa'] ?? null,
            'en' => $data['summary']['en'] ?? null,
            'ar' => $data['summary']['ar'] ?? null,
        ];

        $imageUrl = $product->image;
        if ($request->hasFile('image')) {
            $imageUrl = $imageProcessor->storeImage($request->file('image')) ?: $product->image;
        } elseif (is_string($data['image'] ?? null) && str_starts_with($data['image'], 'data:image')) {
            $imageUrl = $imageProcessor->storeDataUrl($data['image']) ?: $product->image;
        }

        $product->update([
            'name' => $name,
            'category' => $data['category'] ?? null,
            'status' => $data['status'] ?? 'available',
            'summary' => $summary,
            'size' => $data['size'] ?? null,
            'packaging' => $data['packaging'] ?? null,
            'min_order' => $data['min_order'] ?? null,
            'image' => $imageUrl,
            'hidden' => $request->boolean('hidden'),
        ]);

        return redirect()->route('panel.products')->with('success', 'محصول بروزرسانی شد');
    }

    public function destroyProduct(Product $product)
    {
        $product->delete();

        return redirect()->route('panel.products')->with('success', 'محصول حذف شد');
    }
}
