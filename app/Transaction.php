<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'transaction_id', 'payment_type',
        'currency', 'item_name', 'item_quantity',
        'item_price', 'email', 'phone', 'status',
        'payment_gateway_id', 'product_id', 'user_id',
    ];
}
