<?php

namespace App\Http\Controllers\Auth;

use App;
use Auth;
use Carbon\Carbon;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', ['except' => 'logout']);
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
                'message' => "You succesfully login into your account",
                'status' => 1,
                'action' => 'Login succesfully',
                'date_created' => Carbon::now(),
            ]);
    }
}
