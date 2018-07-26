<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactMail extends Mailable
{
  use Queueable, SerializesModels;


   public $message;


  public function __construct($message)
  {

      $this->message = $message;
  }


  public function build()
  {

    $input = array('name' => $this->message['name'], 'phone' => $this->message['phone'], 'email' => $this->message['email'], 'message' => $this->message['message'], );

    return $this->view('emails.contactMail')->subject('New Message')->with(['inputs' => $input,]);

  }
}
