<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index($locale, Order $order)
    {
        return view('admin.products.order.index', [
            'order' => $order
        ]);
    }

    public function create($locale, order $order)
    {
        return view('admin.products.order.create', ['order' => $order]);
    }

    public function store()
    {
        $total = request()->weight * request()->quantity;
        $productTotal = request()->price * request()->quantity;
        foreach (\App\Models\Product::all() as $product)
            if (request()->product_id == $product->id) {
                $product = $product->title;
                Order::create(array_merge($this->validateOrder(), [
                        'product_total' => $productTotal,
                        'product' => $product,
                        'total' => $total
                    ]
                ));
                foreach (\App\Models\Order::all() as $order)
                    if (request()->created == $order->created) {
                        $attributes['comment'] = request()->comment;
                        $order->update($attributes);
                    }
            }
        return redirect()->back()->with('message', 'Operation Successful !');
//        return redirect('/'.app()->getLocale().'/admin/products/orders')->with('success', 'price created');
    }

//
    public function edit($locale, Order $order)
    {
//        foreach (Order::all() as $ordeR){
//            if ($ordeR->created === $order->created){

        return view('admin.products.order.edit', ['order' => $order]);
//            }
//        }


    }

//
    public function update($locale, Order $order)
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
        return redirect()->back()->with('message', 'Operation Successful !');
//        return redirect('/'.app()->getLocale().'/admin/products/orders')->with('success', 'Product Updated!');
    }

    public function destroy($locale, Order $order)
    {

        $order->delete();
        return redirect()->back()->with('message', 'Operation Successful !');

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
            'product_id' => '',


        ]);
    }

    public function orderText()
    {
//        'orders' => Order::all()->unique('created')->sortBy('id')]);
        return view('admin.products.order.text', [
            'orders' => Order::orderBy('created', 'desc')->paginate(200)->withQueryString()]);

    }

    public function date($locale, Order $order)
    {
        return view('admin.products.order.sort', [
            'orders' => Order::orderBy('tel')->get()]);
    }

    public function sort($locale, Order $order)
    {

        if (request()->start === 0) {

            return view('admin.products.order.sort', [
                'orders' => Order::all()]);
        } else {
            $fromDate = request()->start;
            $toDate = request()->end;
            $start_date = date('Y-m-d 00:00:00', strtotime($fromDate));

            $end_date = date('Y-m-d 23:59:59', strtotime($toDate));


            return view('admin.products.order.sort', [
                'orders' => Order::where('created_at', '>=', $start_date)
                    ->where('created_at', '<=', $end_date)->get()]);
        }


    }

    public function payment($locale, Order $order)
    {

        foreach (\App\Models\Order::all() as $order)
            if (request()->created == $order->created) {
                $attributes['payment_status'] = request()->payment_status;
                $order->update($attributes);
            }
         return redirect()->back()->with('message', 'Operation Successful !');
}
    public function delivery($locale, Order $order)
    {

        foreach (\App\Models\Order::all() as $order)
            if (request()->created == $order->created) {
                $attributes['delivery_status'] = request()->delivery_status;
                $order->update($attributes);
            }
        return redirect()->back()->with('message', 'Operation Successful !');
    }
}
