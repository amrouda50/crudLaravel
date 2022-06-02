<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', function (/*Request $req*/) {
        return Inertia::render('Auth/Login', [

        ]);

});
Route::get('/', function () {
   $users =  DB::table('users')->where('email' , '=', session()->get('email'));

   $user = $users->first();
    return Inertia::render('MainPage', [
        'user' => isset($user) ? $user->name: ''
    ]);
});
Route::get('/send-email', [MailController::class, 'attachment_email']);

Route::post("/auth" , [UserAuth::class , 'userLogin']);
//Route::view('login' , 'login');


