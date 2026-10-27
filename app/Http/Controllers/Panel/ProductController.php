<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): JsonResponse
    {
        $products = Product::orderBy('sort_order')->orderBy('id')->get();

        return response()->json([
            'products' => $products,
        ]);
    }

    private function handleImage($image)
    {
        if (! $image) {
            return null;
        }
        if (is_string($image) && Str::startsWith($image, 'data:image')) {
            $image = preg_replace('/^data:image\/\w+;base64,/', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            if ($imageData === false) {
                return null;
            }
            $filename = 'products/'.Str::uuid().'.jpg';
            Storage::disk('public')->put($filename, $imageData);
            return asset('storage/'.$filename);
        }
        return $image;
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'array'],
            'name.fa' => ['required', 'string', 'max:191'],
            'name.en' => ['nullable', 'string', 'max:191'],
            'name.ar' => ['nullable', 'string', 'max:191'],
            'category' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'in:available,off_season'],
            'summary' => ['nullable', 'array'],
            'size' => ['nullable', 'string', 'max:191'],
            'packaging' => ['nullable', 'string', 'max:191'],
            'min_order' => ['nullable', 'string', 'max:191'],
            'months' => ['nullable', 'array'],
            'image' => ['nullable'],
            'hidden' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $slug = Str::slug($data['name']['en'] ?: ($data['name']['fa'] ?? 'product'));
        if ($slug === '') {
            $slug = 'product';
        }
        $baseSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$count++;
        }

        $image = $this->handleImage($data['image'] ?? null);

        $product = Product::create([
            'slug' => $slug,
            'name' => $data['name'],
            'category' => $data['category'] ?? null,
            'status' => $data['status'] ?? 'available',
            'summary' => $data['summary'] ?? null,
            'size' => $data['size'] ?? null,
            'packaging' => $data['packaging'] ?? null,
            'min_order' => $data['min_order'] ?? null,
            'months' => $data['months'] ?? array_fill(0, 12, true),
            'image' => $image,
            'hidden' => $data['hidden'] ?? false,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return response()->json(['product' => $product], 201);
    }

    public function update(Request $request, Product $product): JsonResponse
    {
        $data = $request->validate([
            'name' => ['sometimes', 'array'],
            'name.fa' => ['sometimes', 'required', 'string', 'max:191'],
            'name.en' => ['nullable', 'string', 'max:191'],
            'name.ar' => ['nullable', 'string', 'max:191'],
            'category' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'in:available,off_season'],
            'summary' => ['nullable', 'array'],
            'size' => ['nullable', 'string', 'max:191'],
            'packaging' => ['nullable', 'string', 'max:191'],
            'min_order' => ['nullable', 'string', 'max:191'],
            'months' => ['nullable', 'array'],
            'image' => ['nullable'],
            'hidden' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        if (array_key_exists('image', $data)) {
            $data['image'] = $this->handleImage($data['image']);
        }

        $product->update($data);

        return response()->json(['product' => $product->fresh()]);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json(['ok' => true]);
    }
}
