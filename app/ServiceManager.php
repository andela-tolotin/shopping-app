<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceManager extends Model
{
    protected $fillable = ['user_id', 'product_id'];

    public function product()
    {
    	$this->hasMany('App\Product');
    }

    public function user()
    {
    	$this->belongsTo('App\User');
    }
}
