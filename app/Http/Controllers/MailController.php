<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\FormMail;
class MailController extends Controller
{
    public function attachment_email(Request $r) {
        $info = $r->input();
        dd($info);
        $email = 'positronx@gmail.com';

        $mailData = [
            'title' => 'Demo Email',
            'url' => 'https://www.positronx.io'
        ];

        Mail::to($email)->send(new EmailDemo($mailData));

        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);
    }
}
