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
public function redirectToFacebook()
{
    return Socialite::driver('facebook')->redirect();
}


/**
 * Create a new controller instance.
 *
 * @return void
 */
public function handleFacebookCallback()
{
    try {
        $user = Socialite::driver('facebook')->user();
        $create['name'] = $user->getName();
        $create['email'] = $user->getEmail();
        $create['facebook_id'] = $user->getId();


        $userModel = new User;
        $createdUser = $userModel->addNew($create);
        Auth::loginUsingId($createdUser->id);


        return redirect()->route('home');


    } catch (Exception $e) {


        return redirect('auth/facebook');


    }
  }
}
