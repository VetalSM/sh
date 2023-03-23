<?php

namespace App\Http\Controllers;

use App\Models\BalanceProduct;
use App\Models\ProductPrice;
use Illuminate\Http\Request;

class AdminProductsPriceController extends Controller
{
    public function index($locale, ProductPrice $productPrice)
    {

        return view('admin.products.product.index', [
            'productPrice' => $productPrice
        ]);
    }

    public function create()
    {
        return view('admin.products.product.create', );
    }

    public function store()
    {
        foreach (\App\Models\Product::all() as $product)

            if(request()->product_id == $product->id) {
                $name = $product->title;

                ProductPrice::create(array_merge($this->validateProductPrice(), [
                        'name' => $name]
                ));
            }
        return redirect('/'.app()->getLocale()."/admin/products/balance_products")->with('success', 'price created');
    }

    public function edit($locale,ProductPrice $productPrice)
    {
        return view('admin.products.balance.edit', ['balanceProduct' => $productPrice]);
    }

//
    public function update($locale,ProductPrice $productPrice)
    {

        $countOld = $balanceProduct->count;
        $countNew = $this->validateBalanceProduct($balanceProduct)['count'];
        $count = $balanceProduct->count + $this->validateBalanceProduct($balanceProduct)['count'];

        $attributes =[
            'count' => $count,
            'unit' =>  $this->validateBalanceProduct($balanceProduct)['unit'],
            'expected' => $this->validateBalanceProduct($balanceProduct)['expected'],
            'old_count'=> $this->validateBalanceProduct($balanceProduct)['count']
        ];

        $balanceProduct->update($attributes);
        return redirect('/'.app()->getLocale().'/admin/products/balance_products')->with('success', 'Product Updated!');
    }

    public function destroy($locale,ProductPrice $productPrice)
    {
        $balanceProduct->delete();
        return redirect('/'.app()->getLocale().'/admin/products/balance_products')->with('success', 'Price Deleted!');
    }

    protected function validateProductPrice(?ProductPrice $productPrice = null): array
    {
        $productPrice ??= new ProductPrice();
        return request()->validate([
            'name' => '',
            'price' => '',
            'deliver_usa' => '',
            'deliver_ukr' => '',
            'other' => '',
            'tax' =>'',
            'dollar' => '',
            'ad' => '',
            'product_id' => '',

        ]);
    }

}
