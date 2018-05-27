<?php

// SocialAuthFacebookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialFacebookAccountService;
use App\User;
use Auth;

class SocialAuthFacebookController extends Controller
{
  /**
 * Create a new controller instance.
 *
 * @return void
 */
public function redirect()
{
    return Socialite::driver('facebook')->redirect();
}


/**
 * Create a new controller instance.
 *
 * @return void
 */
public function callback()
{
    try {
        $user = Socialite::driver('facebook')->user();

        $create['name'] = $user->getName();
        $create['email'] = $user->getEmail();
        $create['facebook_id'] = $user->getId();
        $create['password'] = 'wayne1980';


        $userModel = new User;
        $createdUser = $userModel->addNew($create);
        Auth::loginUsingId($createdUser->id);


        return redirect()->route('home');


    } catch (Exception $e) {


        return redirect('auth/facebook');


    }
  }
}
