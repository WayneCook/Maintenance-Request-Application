<?php

namespace App\Http\Controllers\Auth;
use App\FacebookUser;
use Illuminate\Auth\Middleware;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Socialite;


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


            $user = User::where('email', $userSocial->user['email'])->first();

            if ($user) {
              if (Auth::loginUsingId($user->id)) {
                return redirect()->route('home');
              }
            }

            $str = 'abcdefghijklmnop';
            $ShuffleStr = str_shuffle($str);
            $password = Hash::make($ShuffleStr);

            $userSignup = User::create([
              'facebook_id' => $userSocial->user['id'],
              'name' => $userSocial->user['name'],
              'email' => $userSocial->user['email'],
              'password' => $password,
              'avatar' => $userSocial->avatar,
            ]);

            if($userSignup){

              if (Auth::loginUsingId($userSignup->id)) {

                return redirect()->route('home');
              }
            }
        }

        public function guard()
         {
          return Auth::guard('facebookUser');
        }
    }
