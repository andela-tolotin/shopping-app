<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 
        'product_id', 
        'transaction_id',
        'ratings'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function transaction()
    {
    	return $this->belongsTo('App\Transaction');
    }
}
