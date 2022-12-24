<?php

namespace App\Http\Controllers;
use App\Rules\PhoneNumber;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCommentsController extends Controller
{
    public function store(Product $product)
    {
        request()->validate([
            'tel'=>  ['required', new PhoneNumber],
            'body' => 'required'
        ]);

        $product->comments()->create([
            'name' => request('Назвіться'),
            'tel' => request('Телефон'),
            'body' => request('body')
        ]);

        return back();
    }
}
