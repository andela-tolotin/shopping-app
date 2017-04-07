<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $fillable = ['advert_photos', 'user_id', 'product_id'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function scopeFindAll($query)
    {
    	return $query
    	    ->orderBy('id', 'DESC')
    	    ->get();
    }

    public function scopeFindOneById($query, $id)
    {
    	return $query
    	    ->where('id', $id)
    	    ->first();
    }
}
