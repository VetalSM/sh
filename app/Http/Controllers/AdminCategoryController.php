<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('admin.products.category.index', [
            'category' => $category
        ]);
    }

    public function create(category $category)
    {
        return view('admin.products.category.create', ['category' => $category]);
    }

    public function store()
    {
        Category::create(array_merge($this->validateCategory()));

        return redirect('/admin/products/categories')->with('success', 'price created');
    }
//
    public function edit(Category $category)
    {
        return view('admin.products.category.edit', ['category' => $category]);
    }

//
    public function update(Category $category)
    {

        $attributes = $this->validateCategory($category);
//        $thumbnailName = $attributes['slug'] . '.jpg';
//        if ($attributes['thumbnail'] ?? false) {
//            $attributes['thumbnail'] = request()->file('thumbnail')->storeAs('thumbnails', $thumbnailName);
//        }
//        if ($attributes['certificate'] ?? false) {
//            $attributes['certificate'] = request()->file('certificate')->store('thumbnails');
//        }
//        if ($attributes['ifra_certificate'] ?? false) {
//            $attributes['ifra_certificate'] = request()->file('ifra_certificate')->store('thumbnails');
//        }
//        if ($attributes['safety'] ?? false) {
//            $attributes['safety'] = request()->file('safety')->store('thumbnails');
//        }
        $category->update($attributes);

        return redirect('/admin/products/categories')->with('success', 'Product Updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/admin/products/categories')->with('success', 'Price Deleted!');
    }

    protected function validateCategory(?Category $category = null): array
    {
        $category ??= new Category();

        return request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
    }

}
