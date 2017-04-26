<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
       'user_id',
       'message',
       'status',
       'action',
       'date_created',
       'url',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
