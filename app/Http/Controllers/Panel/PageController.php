<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::orderBy('sort_order')->orderBy('id')->get();
        return view('panel.pages.products', compact('products'));
    }

    public function createProduct()
    {
        return view('panel.products.create');
    }

    public function storeProduct(Request $request)
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
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
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

        $imageUrl = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $imageUrl = asset('storage/'.$path);
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

    public function updateProduct(Request $request, Product $product)
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
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
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
            $path = $request->file('image')->store('products', 'public');
            $imageUrl = asset('storage/'.$path);
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
