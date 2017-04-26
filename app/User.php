<?php

namespace App;

use Laravel\Cashier\Billable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'gender', 'phone', 'address',
        'role_id', 'profile_picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function transactions() 
    {
        return $this->hasMany('App\Transaction');
    }

    public function pointWallet()
    {
        return $this->hasOne('App\PointWallet');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function advertUploads()
    {
        return $this->hasMany('App\Advert');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notifications');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function scopeFindOneByEmail($query, $email)
    {
        return $query
            ->where('email', $email)
            ->first();
    }

    public function scopeFindOneByPhone($query, $phone)
    {
        return $query
            ->where('phone', $phone)
            ->first();
    }

    public function scopeFindOneById($query, $id)
    {
        return $query
            ->where('id', $id)
            ->first();
    }

    public function scopeFindAll($query)
    {
        return $query
            ->orderBy('name', 'ASC')
            ->get();
    }
}
