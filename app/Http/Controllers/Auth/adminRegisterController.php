<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class adminRegisterController extends Controller
{

    public function __construct()
    {

         $this->middleware('auth');

    }



    public function registerUser(Request $request){

      request()->validate([
          'username' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'unit_number' => 'required',
          'password' => 'required|string|min:6|confirmed',
      ]);

        //save user to database
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->unit_number = $request->unit_number;
        $user->role_id = 3;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index');
    }
}
