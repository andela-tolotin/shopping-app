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
    	return $this->hasMany('App\Transaction');
    }

    public function scopeFindOneById($query, $id)
    {
    	return $query
    	    ->where('id', $id)
    	    ->first();
    }

    public function scopeFindOneByName($query, $name)
    {
        return $query
            ->where('name', ucwords($name))
            ->orWhere('name', strtolower($name))
            ->first();
    }

    public function scopeFindAll($query)
    {
        return $query
            ->orderBy('id', 'DESC')
            ->get();
    }
}
