<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 
        'product_id', 
        'transaction_id',
        'ratings',
        'assignee_id',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function transaction()
    {
    	return $this->belongsTo('App\Transaction');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
