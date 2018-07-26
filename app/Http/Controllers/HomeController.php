<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function messager(Request $request)
    {

      Mail::to(['waynedemetra@gmail.com', 'wf-monrovia-mgr@rpkdevelopment.com'])->send(new contactMail($request));

      return 'success';
    }
}
