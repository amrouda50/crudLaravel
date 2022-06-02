<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormMail;
class MailController extends Controller
{
    public function attachment_email(Request $r) {
        $info = $r->input();
       // dd($info);
        $email = $info['email'];

        $mailData = [
            'title' => 'CrudAppLaravelEmail',
            'body' => $info['message']
        ];
        Mail::to($email)->send(new FormMail($mailData));

        return response()->json([
            'message' => 'Email has been sent.'
        ], 200);
    }
}