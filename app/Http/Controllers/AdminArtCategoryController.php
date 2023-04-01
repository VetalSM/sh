<?php

namespace App\Http\Controllers;
use App\Models\ArtCategory;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;
class AdminArtCategoryController extends Controller
{
    public function index($locale,ArtCategory $category)
    {

        return view('admin.articles.category.index', [
            'category' => $category
        ]);
    }

    public function create($locale,ArtCategory $category)
    {

        return view('admin.articles.category.create', ['category' => $category]);
    }

    public function store()
    {
        ArtCategory::create(array_merge($this->validateCategory()));

        return redirect('/'.app()->getLocale().'/admin/articles/categories/index')->with('success', 'price created');
    }
//
    public function edit($locale, $category)
    {

        $categor = ArtCategory::where('id', $category)->get();

        return view('admin.articles.category.edit', ['category' => $categor['0']]);
    }

//
    public function update($locale, $category)
    {

        $attributes = $this->validateCategory($category);
        dd($attributes);
        ArtCategory::where('id', $category)->update($attributes);

        return redirect('/'.app()->getLocale().'/admin/articles/categories/index')->with('success', 'Product Updated!');
    }

    public function destroy($locale, $category)

    {
        ArtCategory::where('id', $category)->delete();



        return redirect('/'.app()->getLocale().'/admin/articles/categories/index')->with('success', 'Price Deleted!');
    }

    protected function validateCategory(?ArtCategory $category = null): array
    {
        $category ??= new ArtCategory();

        return request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
    }

}
