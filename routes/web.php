<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageUsersController;

  
Route::put('/update','ManageUsersController@update');
Route::resource('manageusers', ManageUsersController::class);
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
Route::get('/send-mail',function(){

    $data = [
        'name'=>'NPC',
        'email'=>'test@dummy.com'
    ];

    \Mail::to('user@provider.com')->send(new \App\Mail\SendTestMail($data));

    return "Mail Sent Successfully!!";
});


Route::get('/', function () {
    return view('/auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
