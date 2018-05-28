<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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




        public function handleProviderCallback(SocialFacebookAccount $service)
        {



            $userSocial = Socialite::driver('facebook')->stateless()->user();

            // dd($userSocial);
            $user = FacebookUser::where('email', $userSocial->user['email'])->first();

            if ($user) {
              if (FacebookAuth::loginUsingId($user->id)) {
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
              if (FacebookUser::loginUsingId($userSignup->facebook_id)) {
                return redirect()->route('home');
              }
            }
        }
    }
