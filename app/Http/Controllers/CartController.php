<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Price;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Exceptions\InvalidConditionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class CartController extends Controller
{
//    /**
//     * @throws InvalidConditionException
//     */
//    public function Condition(Request $request)
//    {
//        \Cart::clearItemConditions($request->id);
//        $promo = $request->promo;
//        $item = new \Darryldecode\Cart\CartCondition(array(
//            'name' => 'SALE 5%',
//            'type' => 'sale',
//            'value' => $promo,
//        ));
//        session()->flash('success',  __('Позиція оновлена успішно!'));
//        \Cart::addItemCondition($request->id, $item);
//        return redirect()->route('cart.list',app()->getLocale());
//
//    }
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        return view('components.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {

        $attributes = request();
        $price = Price::all()->where('price', "$attributes->price")->first();

        if(!isset($price->currency)){
          $price->currency=" ";}
        \Cart::add([
            'id' => $attributes->id,
            'name' => $attributes->name,
            'price' => $attributes->price,
            'quantity' => $attributes->quantity,
            'attributes' => array(
                'image' => $attributes->image,
                'prices'=> $attributes->prices,
                'currency' => $price->currency,
                'unit'=>$price->unit,
                'weight'=>$price->weight,
                'prod_id'=>$attributes->prod_id,
            )
        ]);
        session()->flash('success', __('Товар додано у кошик!'));


        return  redirect(session('prod_url'));
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => ['relative' => false, 'value' => $request->quantity,
                ],
            ]
        );

        session()->flash('success',  __('Позиція оновлена успішно!'));

        return redirect()->route('cart.list',app()->getLocale());
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', __('Позицію видалено!'));

        return redirect()->route('cart.list',app()->getLocale());
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', __('Всі позиції видалено'));

        return redirect()->route('cart.list',app()->getLocale());

    }

    public static function order()
    {
        $attributes = request()->validate([
            'name' => '',
            'total' => '',
            'tel' => 'required|min:13|max:13',
            'email' => '',
            'П_І_Б' => '',
            'address' => '',
            'comment'=>''
        ]);
        $time = date("Y-m-d H:i");

        foreach (\Cart::getContent() as $cart) {
            $total = \Cart::gettotal();
            $product_total =  $cart->price * $cart->quantity;

            $weight = $cart->attributes->weight * $cart->quantity;

            $order = new order([
                'tel' => $attributes['tel'],
                'credentials' => $attributes['П_І_Б'],
                'address' => $attributes['address'],
                'comment' => $attributes['comment'],
                'product' => $cart->name,
                'product_id' => $cart->attributes->prod_id,
                'price' => $cart->price,
                'currency' => $cart->attributes->currency,
                'weight' => $weight,
                'unit' => $cart->attributes->unit,
                'quantity' => $cart->quantity,
                'product_total' => $product_total,
                'total' => $total,
                'created' => time(),
            ]);
            $order -> save();
        }



        $reply_markup= '';
        $bot_token = '5391156329:AAH8K4w5_JQDD6C4BQ1Q1eXLr1Fm2NDnZC4';
        $chat_id = '-1001881481930';
        $text = $attributes['П_І_Б']  ."\n".' tel: ' . $attributes['tel'] . '  '."\n" . $attributes['email'] . "\n" . $attributes['address']  ."\n"."\n" . $attributes['name'] . "\n" . 'Загальна ціна: ' . $attributes['total'] . ' грн'."\n".'коментар: '.$attributes['comment'];

        $ch = curl_init();
        $ch_post = [
            CURLOPT_URL => 'https://api.telegram.org/bot' . $bot_token . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => [
                'chat_id' => $chat_id,
                'parse_mode' => 'HTML',
                'text' => $text,
                'reply_markup' => $reply_markup,
            ]
        ];

        curl_setopt_array($ch, $ch_post);
        curl_exec($ch);


        \Cart::clear();
        return redirect("/".app()->getLocale())->with('order', __("Дякуємо за замовлення, найближчим часом зв'яжемося з вами!"));
    }
}

