<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'isVerified');

Route::get('/resend_email_verification', 'Auth\RegisterController@resendVerification');

Route::view('/nonactivated', 'error.nonactivated');

Route::resource('/files', 'CloudOfe\\FilesController');

Route::get('/email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');

Route::get('/email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');
