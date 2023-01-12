<?php

namespace App\Http\Controllers;

use App\Models\Product;


use App\Models\ProductRu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function index()
    {
        $locale = App::currentLocale();
//        if ($locale === 'ua') {
            Session::put('prod_url', request()->fullUrl());
        return view('products.index', [
            'products' => Product::orderBy('category_id')->orderBy('status')->filter(
                request(['search', 'category'])
            )->paginate(18)->withQueryString()
        ]);
//            return view('products.index', [
//                'products' => Product::latest()->filter(
//                    request(['search', 'category', 'author'])
//                )->paginate(18)->withQueryString()
//            ]);
//        }else{
//            Session::put('prod_url', request()->fullUrl());
//            return view('products.index', [
//                'products' => ProductRu::latest()->filter(
//                    request(['search', 'category', 'author'])
//                )->paginate(18)->withQueryString()
//            ]);

        }

    public function show($locale,Product $product)
    {
//        App::setLocale($locale);
        return view('products.show', [
            'product' => $product
        ]);
    }
}
