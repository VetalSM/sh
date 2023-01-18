<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index($locale,Order $order)
    {
        return view('admin.products.order.index', [
            'order' => $order
        ]);
    }

    public function create($locale,order $order)
    {
        return view('admin.products.order.create', ['order' => $order]);
    }

    public function store()
    {
        $total = request()->weight * request()->quantity;
        $productTotal = request()->price * request()->quantity;
        foreach (\App\Models\Product::all() as $product)

            if(request()->product_id == $product->id) {
                $product = $product->title;
                Order::create(array_merge($this->validateOrder(), [
                        'product_total'=> $productTotal,
                        'product' => $product,
                        'total' => $total
                        ]
                ));
                 return redirect()->back()->with('message','Operation Successful !');
            }

//        return redirect('/'.app()->getLocale().'/admin/products/orders')->with('success', 'price created');
    }
//
    public function edit($locale,Order $order)
    {
//        foreach (Order::all() as $ordeR){
//            if ($ordeR->created === $order->created){

                return view('admin.products.order.edit', ['order' => $order]);
//            }
//        }


    }

//
    public function update($locale,Order $order)
    {

        $attributes = $this->validateOrder($order);

       $attributes['product_total'] = $attributes['price'] * $attributes['quantity'];
        $attributes['total'] = $attributes['weight'] * $attributes['quantity'];
//            $attributes['thumbnail'] = request()->file('thumbnail')->storeAs('thumbnails', $thumbnailName);
//        }
//        if ($attributes['certificate'] ?? false) {
//            $attributes['certificate'] = request()->file('certificate')->store('thumbnails');
//        }
//        if ($attributes['ifra_certificate'] ?? false) {
//            $attributes['ifra_certificate'] = request()->file('ifra_certificate')->store('thumbnails');
//        }
//        if ($attributes['safety'] ?? false) {
//            $attributes['safety'] = request()->file('safety')->store('thumbnails');
//        }

        $order->update($attributes);
        return redirect()->back()->with('message','Operation Successful !');
//        return redirect('/'.app()->getLocale().'/admin/products/orders')->with('success', 'Product Updated!');
    }

    public function destroy($locale,Order $order)
    {

        $order->delete();
        return redirect()->back()->with('message','Operation Successful !');

//dd($order->created);
//        $order->delete();


    }

    protected function validateOrder(?Order $order = null): array
    {

        $order ??= new Order();

        return request()->validate([
            'tel' => '',
            'credentials' => '',
            'address' => '',
            'comment' => '',
            'product' => '',
            'price' => '',
            'currency' => '',
            'weight' => '',
            'unit' => '',
            'quantity' => '',
            'product_total' => '',
            'total' => '',
            'created' => '',
            'product_id'=>'',



        ]);
    }
}