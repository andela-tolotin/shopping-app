<?php

namespace App\Http\Controllers\Auth;

use App;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Log notification
     *
     * @return bolean
     */
    protected function logNotification()
    {
        return Notification::create([
                'user_id' => Auth::user()->id ?? null,
                'message' => "You succesfully created an account",
                'status' => 1,
                'url' => '#',
                'action' => 'Login succesfully',
                'date_created' => Carbon::now(),
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            //'phone' => 'required|phone|unique:users',
            'password' => 'required|min:6|confirmed',
        ]); 
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $this->logNotification();

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'role_id' => 1,
            'password' => bcrypt($data['password']),
        ]);
    }
}
