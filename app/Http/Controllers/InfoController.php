<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function contact()
    {
        return view('components.info.contact');
    }
    public function delivery()
    {
        return view('components.info.delivery');
    }
    public function payment()
    {
        return view('components.info.payment');
    }
}
