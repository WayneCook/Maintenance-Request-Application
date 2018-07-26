<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class workOrderMail extends Mailable
{
    use Queueable, SerializesModels;


     public $workorder;


    public function __construct($order)
    {
        $this->workorder = $order;
    }


    public function build()
    {

      return $this->view('emails.mail')->subject('New Maintanence Request')->with([

        'workorder' => $this->workorder,

      ]);

    }
}
