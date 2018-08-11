<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models;
use App\Signup;
use Auth;

class SignupController extends Controller
{

  public function index()
  {

    $events = DB::table('events')->whereNull('deleted_at')->get();
    $eventCheckArray = array();

    foreach ($events as $event) {

      $check = DB::table('signups')
          ->where('username', '=', Auth::user()->username)
          ->where('event_id', '=', $event->id)
          ->exists();
          $eventCheckArray[] = $check;

    }

      return $eventCheckArray;
  }


  public function store(Request $request)
  {

      $signup = new Signup;
      $signup->event_id = $request->event_id;
      $signup->username = $request->username;
      $signup->save();

      return $request->username;

  }

  public function check(Request $request)
  {

    $check = DB::table('signups')
        ->where('username', '=', Auth::user()->username)
        ->where('event_id', '=', $request->event_id)
        ->exists();

    if ($check) {

      return 'isSignedUp';

    }
  }
}
