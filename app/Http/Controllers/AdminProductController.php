<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductRu;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AdminProductController extends Controller
{

    public function index()
    { $locale = App::currentLocale();

            return view('admin.products.index', [
                'products' => Product::paginate(50)]);

    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store()
    {
        $thumbnailName= $this->validateProduct()['slug'].'.jpg';

        if (isset($this->validateProduct()['safety']) && isset($this->validateProduct()['ifra_certificate'])){
            Product::create(array_merge($this->validateProduct(), [
                'user_id' => request()->user()->id,
                'thumbnail' => request()->file('thumbnail')->storeAs('thumbnails',$thumbnailName),
                'ifra_certificate' => request()->file('ifra_certificate')->store('thumbnails'),
                'safety' => request()->file('safety')->store('thumbnails')
            ]));
        }elseif(isset($this->validateProduct()['certificate'])){
            Product::create(array_merge($this->validateProduct(), [
                'user_id' => request()->user()->id,
                'thumbnail' => request()->file('thumbnail')->storeAs('thumbnails',$thumbnailName),
                'certificate' => request()->file('certificate')->store('thumbnails')
            ]));

        }
        elseif (isset($this->validateProduct()['ifra_certificate'])){
            Product::create(array_merge($this->validateProduct(), [
                'user_id' => request()->user()->id,
                'thumbnail' => request()->file('thumbnail')->storeAs('thumbnails',$thumbnailName),
                'ifra_certificate' => request()->file('ifra_certificate')->store('thumbnails')
            ]));

        }elseif (isset($this->validateProduct()['safety'])){
            Product::create(array_merge($this->validateProduct(), [
                'user_id' => request()->user()->id,
                'thumbnail' => request()->file('thumbnail')->storeAs('thumbnails',$thumbnailName),
                'safety' => request()->file('safety')->store('thumbnails')
            ]));

        }else{
            Product::create(array_merge($this->validateProduct(), [
                'user_id' => request()->user()->id,
                'thumbnail' => request()->file('thumbnail')->storeAs('thumbnails',$thumbnailName)
            ]));
        }

        return redirect('/'.app()->getLocale());
    }

    public function edit($locale,Product $product)
    {
        return view('admin.products.edit', ['product' => $product]);
    }

    public function update($locale,Product $product)
    {

        $attributes = $this->validateProduct($product);
        $thumbnailName= $attributes['slug'].'.jpg';
        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->storeAs('thumbnails',$thumbnailName);
        }
        if ($attributes['certificate'] ?? false) {
            $attributes['certificate'] = request()->file('certificate')->store('thumbnails');
        }
        if ($attributes['ifra_certificate'] ?? false) {
            $attributes['ifra_certificate'] = request()->file('ifra_certificate')->store('thumbnails');
        }
        if ($attributes['safety'] ?? false) {
            $attributes['safety'] = request()->file('safety')->store('thumbnails');
        }
        $product->update($attributes);

        return back()->with('success', 'Product Updated!');
    }

    public function destroy($locale,Product $product)
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
            'certificate' => $product->exists ? ['mimes:pdf'] : ['mimes:pdf'] ,
            'safety' => $product->exists ? ['mimes:pdf'] : ['mimes:pdf'],
            'ifra_certificate' => $product->exists ? ['mimes:pdf'] : ['mimes:pdf'],
            'slug' => ['required', Rule::unique('products', 'slug')->ignore($product)],
            'excerpt' => 'required',
            'body' => 'required',
            'status' => '',
            'prices' =>  '',
            'prom_prices' => '',
            'meta_title' =>'',
            'meta_keywords' =>'',
            'meta_description' =>'',
            'title_ru' => '',
            'excerpt_ru' => '',
            'body_ru' => '',
            'meta_title_ru' =>'',
            'meta_description_ru' =>'',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}
