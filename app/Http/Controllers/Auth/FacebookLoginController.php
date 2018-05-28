<?php

namespace App\Http\Controllers\Auth;
use App\FacebookUser;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;

use Illuminate\Http\Request;

class FacebookLoginController extends Controller
{
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




        public function handleProviderCallback()
        {



            $userSocial = Socialite::driver('facebook')->stateless()->user();


            $user = FacebookUser::where('email', $userSocial->user['email'])->first();

            

            if ($user) {
              if (Auth::guard('facebookUser')->login($userSocial)) {
                return redirect()->route('home');
              }
            }

            $userSignup = Auth::guard('facebookUser')->create([
              'facebook_id' => $userSocial->user['id'],
              'name' => $userSocial->user['name'],
              'email' => $userSocial->user['email'],
              'password' => bcrypt('waynecook1980'),
              'avatar' => $userSocial->avatar,
            ]);


            if($userSignup){
              if (Auth::guard('facebookUser')->loginUsingId($userSignup->facebook_id)) {
                return redirect()->route('home');
              }
            }
        }
    }
