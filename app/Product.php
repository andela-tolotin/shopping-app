<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'price', 'description',
        'discount', 'tax', 'category_id',
    ];

    public function category()
    {
    	return $this->belongsTo('App/Product');
    }
}
