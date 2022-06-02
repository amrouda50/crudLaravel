<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormMail;
use Illuminate\Support\Facades\Redirect;
class MailController extends Controller
{
    public function attachment_email(Request $r) {
     if(session()->exists('email')){

         $info = $r->input();
         $email = $info['email'];

         $mailData = [
             'title' => 'CrudAppLaravelEmail',
             'body' => $info['message'],
         ];
         Mail::to($email)->send(new FormMail($mailData, $r->file('file')));

         return response()->json([
             'message' => 'Email has been sent.'
         ], 200);

     }
     return Redirect::back()->withErrors([
            'data' => 'User is not Logged in',
        ]);

    }
}
