<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        return view('components.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'prices'=> $request->prices,
                'currency' => $request->currency,
                'unit'=>$request->unit,
                'weight'=>$request->weight
            )
        ]);
        session()->flash('success', 'Товар додано у кошик!');

        return redirect('/');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Позиція оновлена успішно!');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Позицію видалено!');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'Всі позиції видалено :(');

        return redirect()->route('cart.list');

    }

    public static function message_to_telegram($text, $reply_markup = '')
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



        $bot_token = '5391156329:AAH8K4w5_JQDD6C4BQ1Q1eXLr1Fm2NDnZC4';
        $chat_id = '-760962497';
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
        return redirect('/')->with('order', "Дякуємо за замовлення, найближчим часом зв'яжемося з вами!");
    }
}

