<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
       'name', 
    ];

    public function user()
    {
    	return $this->hasOne('App/User');
    }

    public function scopeFindOneById($query, $roleId)
    {
    	return $query
    	    ->where('id', $roleId)
    	    ->first();
    }
}
