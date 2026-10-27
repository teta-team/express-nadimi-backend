<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::orderBy('sort_order')->orderBy('id')->get();

        return response()->json([
            'products' => $products,
        ]);
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
            'origin' => ['nullable', 'string'],
            'summary' => ['nullable', 'array'],
            'size' => ['nullable', 'string', 'max:191'],
            'packaging' => ['nullable', 'string', 'max:191'],
            'min_order' => ['nullable', 'string', 'max:191'],
            'months' => ['nullable', 'array'],
            'image' => ['nullable', 'string'],
            'hidden' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $slug = Str::slug($data['name']['en'] ?: $data['name']['fa']);
        $baseSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$count++;
        }

        $product = Product::create([
            'slug' => $slug,
            'name' => $data['name'],
            'category' => $data['category'] ?? null,
            'status' => $data['status'] ?? 'available',
            'origin' => $data['origin'] ?? null,
            'summary' => $data['summary'] ?? null,
            'size' => $data['size'] ?? null,
            'packaging' => $data['packaging'] ?? null,
            'min_order' => $data['min_order'] ?? null,
            'months' => $data['months'] ?? array_fill(0, 12, true),
            'image' => $data['image'] ?? null,
            'hidden' => $data['hidden'] ?? false,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return response()->json(['product' => $product], 201);
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json(['product' => $product]);
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
            'origin' => ['nullable', 'string'],
            'summary' => ['nullable', 'array'],
            'size' => ['nullable', 'string', 'max:191'],
            'packaging' => ['nullable', 'string', 'max:191'],
            'min_order' => ['nullable', 'string', 'max:191'],
            'months' => ['nullable', 'array'],
            'image' => ['nullable', 'string'],
            'hidden' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $product->update($data);

        return response()->json(['product' => $product->fresh()]);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json(['ok' => true]);
    }
}
