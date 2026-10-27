<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
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
            'hidden' => ['nullable'],
            'image' => ['nullable', 'file'],
        ]);

        $faName = $validated['name']['fa'];
        $enName = $validated['name']['en'] ?? null;
        $arName = $validated['name']['ar'] ?? null;

        $slugSource = $enName ?: $faName;
        $slug = Str::slug($slugSource);
        if ($slug === '') {
            $slug = 'product-'.Str::random(6);
        } else {
            $baseSlug = $slug;
            $count = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $baseSlug.'-'.$count++;
            }
        }

        $imageUrl = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if (! $file->isValid()) {
                return back()->withInput()->withErrors(['image' => 'The image failed to upload.']);
            }
            $contents = @file_get_contents($file->getRealPath());
            if ($contents === false) {
                return back()->withInput()->withErrors(['image' => 'The image failed to upload.']);
            }
            $ext = strtolower($file->getClientOriginalExtension() ?: $file->guessExtension() ?: 'jpg');
            if (! in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                $ext = 'jpg';
            }
            $filename = 'products/'.Str::uuid().'.webp';
            if (function_exists('imagecreatefromstring')) {
                $src = @imagecreatefromstring($contents);
                if ($src) {
                    $w = imagesx($src);
                    $h = imagesy($src);
                    $max = 1600;
                    if ($w > $max || $h > $max) {
                        $ratio = min($max/$w, $max/$h);
                        $nw = (int)($w*$ratio);
                        $nh = (int)($h*$ratio);
                        $dst = imagecreatetruecolor($nw, $nh);
                        imagealphablending($dst, false);
                        imagesavealpha($dst, true);
                        imagecopyresampled($dst, $src, 0, 0, 0, 0, $nw, $nh, $w, $h);
                        ob_start();
                        imagewebp($dst, null, 82);
                        $webp = ob_get_clean();
                        imagedestroy($dst);
                        imagedestroy($src);
                        Storage::disk('public')->put($filename, $webp);
                        $imageUrl = asset('storage/'.$filename);
                    } else {
                        imagealphablending($src, false);
                        imagesavealpha($src, true);
                        ob_start();
                        imagewebp($src, null, 82);
                        $webp = ob_get_clean();
                        imagedestroy($src);
                        Storage::disk('public')->put($filename, $webp);
                        $imageUrl = asset('storage/'.$filename);
                    }
                } else {
                    Storage::disk('public')->put('products/'.Str::uuid().'.'.$ext, $contents);
                    $imageUrl = asset('storage/products/'.basename(Storage::disk('public')->files('products')[count(Storage::disk('public')->files('products'))-1] ?? ''));
                }
            } else {
                $filename = 'products/'.Str::uuid().'.'.$ext;
                Storage::disk('public')->put($filename, $contents);
                $imageUrl = asset('storage/'.$filename);
            }
        }

        $product = Product::create([
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
            'size' => $validated['size'] ?? null,
            'packaging' => $validated['packaging'] ?? null,
            'min_order' => $validated['min_order'] ?? null,
            'months' => [true,true,true,true,true,true,true,true,true,true,true,true],
            'image' => $imageUrl,
            'hidden' => $request->boolean('hidden'),
            'sort_order' => (Product::max('sort_order') ?? 0) + 1,
        ]);

        if (! $product->wasRecentlyCreated && ! $product->exists) {
            return back()->withInput()->withErrors(['msg' => 'ذخیره محصول انجام نشد.']);
        }

        return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت اضافه شد');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
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
            'hidden' => ['nullable'],
            'image' => ['nullable', 'file'],
        ]);

        $faName = $validated['name']['fa'];
        $enName = $validated['name']['en'] ?? null;
        $arName = $validated['name']['ar'] ?? null;

        $imageUrl = $product->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if (! $file->isValid()) {
                return back()->withInput()->withErrors(['image' => 'The image failed to upload.']);
            }
            $contents = @file_get_contents($file->getRealPath());
            if ($contents === false) {
                return back()->withInput()->withErrors(['image' => 'The image failed to upload.']);
            }
            if (function_exists('imagecreatefromstring')) {
                $src = @imagecreatefromstring($contents);
                if ($src) {
                    $w = imagesx($src);
                    $h = imagesy($src);
                    $max = 1600;
                    $dstW = $w;
                    $dstH = $h;
                    if ($w > $max || $h > $max) {
                        $ratio = min($max/$w, $max/$h);
                        $dstW = (int)($w*$ratio);
                        $dstH = (int)($h*$ratio);
                    }
                    $dst = imagecreatetruecolor($dstW, $dstH);
                    imagealphablending($dst, false);
                    imagesavealpha($dst, true);
                    if ($dstW === $w && $dstH === $h) {
                        imagecopy($dst, $src, 0, 0, 0, 0, $w, $h);
                    } else {
                        imagecopyresampled($dst, $src, 0, 0, 0, 0, $dstW, $dstH, $w, $h);
                    }
                    $filename = 'products/'.Str::uuid().'.webp';
                    ob_start();
                    imagewebp($dst, null, 82);
                    $webp = ob_get_clean();
                    imagedestroy($dst);
                    imagedestroy($src);
                    Storage::disk('public')->put($filename, $webp);
                    $imageUrl = asset('storage/'.$filename);
                } else {
                    $filename = 'products/'.Str::uuid().'.webp';
                    Storage::disk('public')->put($filename, $contents);
                    $imageUrl = asset('storage/'.$filename);
                }
            } else {
                $filename = 'products/'.Str::uuid().'.webp';
                Storage::disk('public')->put($filename, $contents);
                $imageUrl = asset('storage/'.$filename);
            }
        }

        $product->update([
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
            'size' => $validated['size'] ?? null,
            'packaging' => $validated['packaging'] ?? null,
            'min_order' => $validated['min_order'] ?? null,
            'image' => $imageUrl,
            'hidden' => $request->boolean('hidden'),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'محصول بروزرسانی شد');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'محصول حذف شد');
    }
}
