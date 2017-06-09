<?php

namespace App\Http\Controllers\Auth;

use App;
use Auth;
use App\User;
use Socialite;
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
                'user_id' => Auth::user()->id ?Auth::user()->id:null,
                'message' => "You succesfully login into your account",
                'status' => 1,
                'url' => '#',
                'action' => 'Login succesfully',
                'date_created' => Carbon::now(),
        ]);
    }

    /**
     * decrement status to 0
     *
     * @return bolean
     */
    protected function decrementOrderStatus()

    {
        $notification = Notification::where('user_id', Auth::user()->id)
            ->orwhere([['status', 1], ['action', 'Approve Order']]
            );

        $notification->decrement('status');
    }

    /**
     * decrement status to 0
     *
     * @return bolean
     */
    protected function decrementLoginStatus()

    {
        $notification = Notification::where('user_id', Auth::user()->id)->where([['status', 1], ['action', 'Login succesfully']]);

        $notification->decrement('status');
    }

    public function redirectToProvider($provider){
      try {
        return Socialite::with($provider)->redirect();
      } catch (\Exception $e) {
        dd($e->getMessage());
      }
    }

    public function handleProviderCallback($provider){
      //try {
        $user = Socialite::driver($provider)->user();
        $authUser=$this->findOrCreate($user,$provider);
        Auth::login($authUser, true);
        return redirect('/');
      //  } catch (\Exception $e) {
      //    dd($e);
      //    return redirect('/login')->with('message','Error while authentication, Try alternative method to login');
      //  }
    }

    public function findOrCreate($user,$provider){

      $authUser = User::where('provider_id', $user->id)->first();
      if ($authUser) {
        return $authUser;
      }
      $authUser = User::where('email',$user->email)->first();
      if ($authUser) {
        return $authUser;
      }

      return User::create([
        'name'     => isset($user->name)?$user->name:'Guest',
        'email'    => $user->email,
        'gender'    => isset($user->user['gender'])?$user->user['gender']:'',
        'provider' => $provider,
        'provider_id' => $user->id,
        'role_id' => '1'
      ]);
    }
}
