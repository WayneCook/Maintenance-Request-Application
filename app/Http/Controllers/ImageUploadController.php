<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;

class ImageUploadController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function imageUpload()

    {

        return view('imageUpload');

    }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

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

}
