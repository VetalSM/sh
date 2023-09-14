<?php

namespace App\Http\Controllers;


use App\Models\Product;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function index()
    {
            Session::put('prod_url', request()->fullUrl());
        return view('products.index', [
            'products' => Product::orderBy('category_id')->orderBy('title')->filter(
                request(['search', 'category'])
            )->paginate(12)->withQueryString()
        ]);
        }

    public function show($locale,Product $product)
    {
        if (auth()->id() == 0) {
            Product::where('id', $product->id)->update(array('views' => $product->views + 1));
        }
//        App::setLocale($locale);
        return view('products.show', [
            'product' => $product
        ]);
    }
}
