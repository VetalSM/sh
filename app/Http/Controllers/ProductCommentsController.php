<?php

namespace App\Http\Controllers;
use App\Rules\PhoneNumber;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCommentsController extends Controller
{
    public function store($locale, Product $product)
    {
        $attributes = request()->validate([
            'name'=>'required',
            'tel'=>  ['required', new PhoneNumber],
            'body' => 'required'
        ]);
//        dd($attributes['name']);
        $product->comments()->create([
            'name' => request("name"),
            'tel' => request('tel'),
            'body' => request('body')
        ]);

        $bot_token = '5391156329:AAH8K4w5_JQDD6C4BQ1Q1eXLr1Fm2NDnZC4';
        $chat_id = '-689926225';
        $text = 'Product: '.$product->title.' .'.' name: '.$attributes['name'] .'  tel: '.$attributes['tel'].'  body: '.$attributes['body'];

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
                'reply_markup' => '',
            ]
        ];
        curl_setopt_array($ch, $ch_post);
        curl_exec($ch);
        return back();
    }
}
