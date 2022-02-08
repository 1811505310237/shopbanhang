<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{
    
    //
    public function sendEmail()
    {
      Mail::to('sretksorjiu.nguyen@gmail.com')->send(new SendMail);
    }
}
