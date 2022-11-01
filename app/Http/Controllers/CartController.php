<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
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

             $bot_token = '5391156329:AAH8K4w5_JQDD6C4BQ1Q1eXLr1Fm2NDnZC4';
            $chat_id ='5260826364';
//        dd($_POST['name']);
//        $search = array('{', '}', ',');
//        $replace = '';
//        $subject = $_POST['name'];
//        $p = str_replace($search, $replace, $subject);
//        list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $_POST['name']);
//        foreach ($_POST['nameDb'] as $name)
//        var_dump( explode(":",$_POST['name']));
//        var_dump($_POST['name']);
//dd($user);
        if (
            !isset($_POST['email'])
            || !isset($_POST['tel'])
            || empty(trim($_POST['email'])
                || empty(trim($_POST['tel'])
                ))) {
            return redirect('/cart')->with('success', 'Заповніть всі поля!');
        } else {
            $email = trim($_POST['email']);
            $tel = trim($_POST['tel']);
        }
        if (isset($tel)) {
            if (!filter_var($tel, FILTER_VALIDATE_INT)) {
                return redirect('/cart')->with('success', 'Невірний формат номеру телефона! Приклад: +380...');
            }
            if (isset($email)) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return redirect('/cart')->with('success', 'Невірний Email!');
                }
                elseif (strlen($tel) != 13) {
                    return redirect('/cart')->with('success', 'Невірний формат номеру телефона! Приклад: +380...');
                }
                else {
                    $text =$_POST['user'].' tel: '.$tel.'  '.$email."\n".$_POST['adress']."\n". $_POST['name'] . 'total: ' . $_POST['total'];
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
         return  redirect('/')->with('order', "Дякуємо за замовлення, найближчим часом зв'яжемося з вами!");
                }
            }
        }
    }
}
