<?php

namespace App\Http\Controllers;

use App\Models\BalanceProduct;
use Illuminate\Http\Request;

class AdminBalanceProductController extends Controller
{
    public function index(BalanceProduct $balanceProduct)
    {
        return view('admin.products.balance.index', [
            'balanceProduct' => $balanceProduct
        ]);
    }
    public function create()
    {
        return view('admin.products.balance.create', );
    }

    public function store()
    {
        foreach (\App\Models\Product::all() as $product)

            if(request()->product_id == $product->id) {
                $name = $product->title;

                BalanceProduct::create(array_merge($this->validateBalanceProduct(), [
                    'name' => $name]
                    ));
            }
        return redirect('/admin/products/balance_products')->with('success', 'price created');
    }

    public function edit(BalanceProduct $balanceProduct)
    {
        return view('admin.products.balance.edit', ['balanceProduct' => $balanceProduct]);
    }

//
    public function update(balanceProduct $balanceProduct)
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
        return redirect('/admin/products/balance_products')->with('success', 'Product Updated!');
    }

    public function destroy(BalanceProduct $balanceProduct)
    {
        $balanceProduct->delete();
        return redirect('/admin/products/balance_products')->with('success', 'Price Deleted!');
    }

    protected function validateBalanceProduct(?BalanceProduct $balanceProduct = null): array
    {
        $balanceProduct ??= new BalanceProduct();
        return request()->validate([
            'name' => '',
            'count' => '',
            'unit' => '',
            'expected' => '',
            'product_id' => '',
            'old_count' =>'',
            'updated_at' => '',

        ]);
    }

}
