<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceProduct extends Model
{
    protected $table = 'balance_products';

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
}


