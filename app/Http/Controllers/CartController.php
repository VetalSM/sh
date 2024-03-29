<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Price;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Exceptions\InvalidConditionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class CartController extends Controller
{
    /**
     * @throws InvalidConditionException
     */
    public function Condition(Request $request)
    {
        \Cart::clearItemConditions($request->id);
        $promo = $request->promo;
        $item = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'SALE 5%',
            'type' => 'sale',
            'value' => $promo,
        ));
        session()->flash('success',  __('Позиція оновлена успішно!'));
        \Cart::addItemCondition($request->id, $item);
        return redirect()->route('cart.list',app()->getLocale());

    }
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        return view('components.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {

        $attributes = request();

        $price = Price::all()->where('name', "$attributes->prices")->where('price', $attributes->price)->first();
        $prodStatus = Product::where('id', $attributes->prod_id)->first();

        if(!isset($price->currency)){
          $price->currency=" ";}
        \Cart::add([
            'id' => $attributes->id,
            'name' => $attributes->name,
            'price' => $attributes->price,
            'quantity' => $attributes->quantity,
            'attributes' => array(
                'status'=> $prodStatus->status,
                'image' => $attributes->image,
                'prices'=> $attributes->prices,
                'currency' => $price->currency,
                'unit'=>$price->unit,
                'weight'=>$price->weight,
                'prod_id'=>$attributes->prod_id,
                'category_id'=>$prodStatus->category_id,
                'slug' => $prodStatus->slug,
            )
        ]);
        session()->flash('prod_cart', __('Товар додано у кошик!'));


        return  redirect(session('prod_url'));
    }

    public function updateCart(Request $request)
    {

        $balanceProducts = \App\Models\BalanceProduct::with('orders')->where('product_id', $request->id_prod)->get();
        $request->prod_weight;
        foreach ($balanceProducts as $balance) {
            $data = $balance->count - (\App\Models\Order::where('product_id', $balance->product_id)->sum('total'));
        }
        $update= $request->prod_weight * $request->quantity;

        if ($data >=$update) {
            \Cart::update(
                $request->id,
                [
                    'quantity' => ['relative' => false, 'value' => $request->quantity,
                    ],
                ]
            );

            session()->flash('success', __('Позиція оновлена успішно!'));

            return redirect()->route('cart.list', app()->getLocale());
        }else
            session()->flash('error', __("Товару не достатньо, для уточнення наявної кількості напишіть у коментарі до замовлення!"));

        return redirect()->route('cart.list', app()->getLocale());
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
            'tel' => 'required|min:9|max:15',
            'email' => '',
            'П_І_Б' => '',
            'address' => '',
            'comment'=>''
        ]);
        $time = date("Y-m-d H:i");

        foreach (\Cart::getContent() as $cart) {

            $product_total =  $cart->price * $cart->quantity;

//            $weight = $cart->attributes->weight * $cart->quantity;
            $total =  $cart->attributes->weight * $cart->quantity;
            $order = new order([
                'tel' => $attributes['tel'],
                'credentials' => $attributes['П_І_Б'],
                'address' => $attributes['address'],
                'comment' => $attributes['comment'],
                'product' => $cart->name,
                'product_id' => $cart->attributes->prod_id,
                'price' => $cart->price,
                'currency' => $cart->attributes->currency,
                'weight' => $cart->attributes->weight,
                'unit' => $cart->attributes->unit,
                'quantity' => $cart->quantity,
                'product_total' => $product_total,
                'total' => $total,
                'product_status' => $cart->attributes->status,
                'price_name' => $cart->attributes->prices,
                'category_id' => $cart->attributes->category_id,
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
// несколько получателей
        $user = $attributes['П_І_Б'];
        $emailS= $attributes['email'];
        $to = "<$emailS>"; // обратите внимание на запятую

// тема письма
        $subject = 'Деталі по замовленню';

// текст письма
        $message = "
<html>
<head>
  <title>Деталі по замовленню</title>
</head>
<body>
  <p/>Вітаємо, $user!<br>
  <span>Дякуємо Вам за замовлення у нашому магазині <a href='https://madeis.com.ua/'>madeis.com.ua</a>!</span>
<span>Деталі по Вашому замовленню:</span><p/>
    <table name='contact_seller' style='border-collapse:collapse;'>
                <thead>
                    <tr>
                        <th></th>
                        <th>Найменування</th>
                         <th>   </th>
                        <th>Кількість</th>
                        <th>ціна</th>
                    </tr>
                </thead>
                <tbody>";
        foreach(\Cart::getContent() as $cart) {
            $totalMail = $attributes["total"];
            $product_total =  $cart->price * $cart->quantity;
            $message .='<tr>
                            <td>
                              <a href="#">
                                        <img src="https://madeis.com.ua/storage/'.$cart->attributes->image.'"  alt="image"
                                             width="80" height="80"> </td>
 </a>
                            <td>'.$cart->name.'  <br/>
            '.$cart->attributes->weight. $cart->attributes->unit. ' / '. $cart->price.$cart->attributes->currency.'</td>
             <td>' . '</td>
                            <td>'.  $cart->quantity  .'</td>
                            <td>'.$product_total.$cart->attributes->currency.'</td>
                        </tr>';
        }
        $message .= "</tbody>
            </table>
            <span>До сплати: $totalMail грн</span>
 <p/><span>Найближчим часом з Вами зв'яжеться менеджер для підтвердження наявності всіх позицій та уточнення деталей.<br/>
   Тільки після уточнення наявності позицій, замовлення може бути оплачене.</span><br/>
   <span style='font-weight: bold'>Звертаємо Вашу увагу, що всі замовлення, узгоджені та оплачені до 13:00, відправляємо того ж дня! </span><br/>
<span>З найкращими побажаннями, команда MadeIS!</span>
</body>
</html>
";

// Для отправки HTML-письма должен быть установлен заголовок Content-type
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers  .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Дополнительные заголовки
// $headers .= 'To: "Vitalii"';
        $headers .= 'From: 	"madeis.com.ua" <orders@madeis.com.ua> ';
// $headers .= 'Cc: support@madeis.com.ua';
// $headers .= 'Bcc: support@madeis.com.ua';

// Отправляем
        mail($to, $subject, $message,  $headers);

        \Cart::clear();
        return redirect("/".app()->getLocale())->with('order', __("Дякуємо за замовлення, найближчим часом зв'яжемося з вами!"));
    }
}

