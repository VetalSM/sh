<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    function add(Request $request)
    {


        $stars_rated = $request->input('product_rating');
        $product_id = $request->input('product_id');
        $user_id =$request->ip();
        $product = $product_id;
        $ratings_check = Rating::where('user_id', $user_id)->where('prod_id', $product_id)->get();
        $ratings_count = $ratings_check->count();
        if($ratings_count === 0) {
            Rating::create([
                'user_id' => $request->ip(),
                'prod_id' => $product_id,
                'stars_rated' => $stars_rated
            ]);
            return redirect()->back()->with('success', __("Дякуємо за оцінку!"));
        }
        else{
            Rating::where('user_id',$user_id)->update([  'stars_rated' => $stars_rated]);
            return redirect()->back()->with('success', "Рейтинг оновлено!");
        }
    }
}
