<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        Session::put('prod_url', request()->fullUrl());
//        return view('products.index', [
//            'products' => Product::orderBy('status')->filter(
//                request(['search', 'category', 'author'])
//            )->paginate(18)->withQueryString()
//        ]);
        return view('products.index', [
            'products' => Product::latest()->filter(
                        request(['search', 'category', 'author'])
                    )->paginate(18)->withQueryString()
        ]);
    }

    public function show(Product $product)
    {

        return view('products.show', [
            'product' => $product
        ]);
    }
}
