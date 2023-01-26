<?php

namespace App\Http\Controllers;
use App\Models\Price;
use Illuminate\Validation\Rule;

class AdminPriceController extends Controller
{
    public function index($locale,Price $price)
    {
        return view('admin.products.price.index', [
             'price' => $price
        ]);
    }

    public function create($locale,Price $price)
    {
        return view('admin.products.price.create', ['price' => $price]);
    }

    public function store()
    {
        Price::create(array_merge($this->validatePrice()));

        return redirect('/'.app()->getLocale().'/admin/products/price')->with('success', 'price created');
    }
//
    public function edit($locale,Price $price)
    {
        return view('admin.products.price.edit', ['price' => $price]);
    }

//
    public function update($locale,Price $price)
    {
        $attributes = $this->validatePrice($price);
        $price->update($attributes);
        return redirect('/'.app()->getLocale().'/admin/products/price')->with('success', 'Product Updated!');
    }

    public function destroy($locale,Price $price)
    {
        $price->delete();
        return redirect('/'.app()->getLocale().'/admin/products/price')->with('success', 'Price Deleted!');
    }

    protected function validatePrice(?Price $price = null): array
    {
        $price ??= new Price();
        return request()->validate([
            'name' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'unit' => 'required',
            'currency' => 'required'
        ]);
    }

}
