<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

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
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }




    public function handleProviderCallback(SocialFacebookAccount $service)
    {



        $userSocial = Socialite::driver('facebook')->stateless()->user();

        // dd($userSocial);
        $user = User::where('email', $userSocial->user['email'])->first();
        if ($user) {
          if (Auth::guard('FacebookUser')->loginUsingId($user->id)) {
            return redirect()->route('home');
          }
        }

        $userSignup = User::create([
          'facebook_id' => $userSocial->user['id'],
          'name' => $userSocial->user['name'],
          'email' => $userSocial->user['email'],
          'password' => bcrypt('waynecook1980'),
          'avatar' => $userSocial->avatar,
        ]);

        if($userSignup){
          if (Auth::guard('FacebookUser')->loginUsingId($userSignup->id)) {
            return redirect()->route('home');
          }
        }
    }
}
