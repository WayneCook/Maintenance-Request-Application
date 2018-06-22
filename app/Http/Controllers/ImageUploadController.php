<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;

class ImageUploadController extends Controller

{



    public function imageUpload()

    {

        return view('imageUpload');

    }



    public function imageUploadPost()

    {

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $user = Auth::user();

        $imageName = str_replace(' ', '', trim($user->username) .'_'. time().'_'.request()->image->getClientOriginalName());

        $profile = User::find($user->id);

        $profile->avatar = $imageName;

        $profile->save();


        request()->image->move(public_path('images/user_images'), $imageName);

        return back()

            ->with('success','You have successfully upload image.')

            ->with('image',$imageName);

    }

    public function adminImageUploadPost(Request $request)

    {

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        // dd($request);

        // $user = $request;
        $profile = User::find($request->userID);

        $imageName = str_replace(' ', '', trim($profile->username) .'_'. time().'_'.request()->image->getClientOriginalName());



        $profile->avatar = $imageName;

        $profile->save();


        request()->image->move(public_path('images/user_images'), $imageName);

        return back()

            ->with('success','You have successfully upload image.')

            ->with('image',$imageName);

    }


    public function imageDelete(Request $request)

    {

      $profile = User::find($request->userID);

      $profile->avatar = null;

      $profile->save();

      return back()

      ->with('success','You have successfully deleted image.');

    }
}
