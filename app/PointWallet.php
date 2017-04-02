<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointWallet extends Model
{
    protected $fillable = [
        'user_id', 'payment_gateway_id', 'point',
        'balance',
    ];

    public function paymentGateways()
    {
        return $this->hasMany('App\PaymentGateway');
    }

    public function users()
    {
        return $this->belongsTo('App\users');
    }

    public function scopeFindOneById($query, $id)
    {
        return $query
            ->where('id', $id)
            ->first();
    }

    public function scopeFindOneByUser($query, $user)
    {
        return $query
            ->where('user_id', $user)
            ->first();
    }

    public function scopeFindAll($query)
    {
        return $query
            ->orderBy('id', 'DESC')
            ->get();
    }
}
