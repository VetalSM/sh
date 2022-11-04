<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Validation\Rule;

class AdminProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store()
    {
        Product::create(array_merge($this->validateProduct(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('/');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product' => $product]);
    }

    public function update(Product $product)
    {
        $attributes = $this->validateProduct($product);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $product->update($attributes);

        return back()->with('success', 'Product Updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Product Deleted!');
    }

    protected function validateProduct(?Product $product = null): array
    {
        $product ??= new Product();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $product->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('products', 'slug')->ignore($product)],
            'excerpt' => 'required',
            'body' => 'required',
            'meta_keywords' =>'required',
            'meta_description' =>'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}
