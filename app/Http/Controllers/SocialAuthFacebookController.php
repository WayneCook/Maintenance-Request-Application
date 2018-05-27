<?php

// SocialAuthFacebookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialFacebookAccountService;
use Auth;

class SocialAuthFacebookController extends Controller
{
  /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
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




        // $user = Socialite::driver('facebook')->user();
        //
        // auth()->login($user);
        // return redirect()->to('/home');
    }
}
