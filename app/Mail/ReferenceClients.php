<?php

namespace App\Mail;

use App\ClientCard;
use App\CuponBuy;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class ReferenceClients extends Mailable
{
  use Queueable, SerializesModels;

  public function __construct()
  {
      //
  }

  public function build()
  {


    $codeUser = ClientCard::select('id','codReference')->where('userId',Auth()->user()->id)->get();
    $onlyCode = $codeUser[0]->codReference;
    //dd($onlyCode);
    return $this->view('sendEmail',compact('onlyCode'));
  }
}
