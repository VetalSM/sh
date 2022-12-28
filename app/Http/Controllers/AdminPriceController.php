<?php

namespace App\Http\Controllers;
use App\Models\Price;
use Illuminate\Validation\Rule;

class AdminPriceController extends Controller
{
    public function index(Price $price)
    {
        return view('admin.products.price.index', [
             'price' => $price
        ]);
    }

    public function create(Price $price)
    {
        return view('admin.products.price.create', ['price' => $price]);
    }

    public function store()
    {
        Price::create(array_merge($this->validatePrice()));

        return redirect('/admin/products/price')->with('success', 'price created');
    }
//
    public function edit(Price $price)
    {
        return view('admin.products.price.edit', ['price' => $price]);
    }

//
    public function update(Price $price)
    {
        $attributes = $this->validatePrice($price);
        $price->update($attributes);
        return redirect('/admin/products/price')->with('success', 'Product Updated!');
    }

    public function destroy(Price $price)
    {
        $price->delete();
        return redirect('/admin/products/price')->with('success', 'Price Deleted!');
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
