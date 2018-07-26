<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Exception;
use Illuminate\Http\Request;
use App\Mail\contactMail;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function messager(Request $request)
    {


      try {

        Mail::to(['waynedemetra@gmail.com', 'wf-monrovia-mgr@rpkdevelopment.com'])->send(new contactMail($request));
      } catch (\Exception $e) {
        return 'failed';
      }

      return 'success';
    }
}
