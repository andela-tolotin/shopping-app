<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    //
    protected $fillable = [
       'name', 'logo', 'client_id',
       'client_secret', 'callback_url',
    ];

    public function transactions()
    {
    	return $this->hasMany('App/Transaction');
    }
}
