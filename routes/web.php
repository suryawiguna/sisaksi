<?php
use App\UserType;

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

 // Authentication Routes...
 Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
 Route::post('login', 'Auth\LoginController@login');
 Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//  // Registration Routes...
//  Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//  Route::post('register', 'Auth\RegisterController@register');

//  // Password Reset Routes...
//  Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//  Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//  Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => 'auth'], function()
{
    Route::redirect('/', '/target');
    Route::get('mykoor', 'KoorController@myKoor')->name('mykoor');
    Route::get('mysaksi', 'SaksiController@mySaksi')->name('mysaksi');
    Route::get('pengumumanku', 'PengumumanController@pengumumanku')->name('pengumumanku');
    Route::get('c1saya', 'C1Controller@c1Saya')->name('c1saya');
    Route::get('akunsaya', 'UserController@akunSaya')->name('akunsaya');
    Route::get('akunsaya/edit', 'UserController@editProfilSaya')->name('editprofil');
    Route::get('/kel/{id}', 'SaksiController@getKoor')->name('getkoor');
    Route::get('/checkpassword/{password}', 'UserController@checkPassword')->name('checkpassword');
    Route::get('/statuspengumuman/{id}/{boolean}', 'PengumumanController@updateStatus')->name('statuspengumuman');

    Route::resource('koor', 'KoorController');
    Route::resource('saksi', 'SaksiController');
    Route::resource('pengumuman', 'PengumumanController');
    Route::resource('user', 'UserController')->only([
        'index', 'show', 'update'
    ]);
    Route::resource('partai', 'PartaiController')->except(['show']);
    Route::resource('c1', 'C1Controller')->except(['show']);
    Route::resource('target', 'TargetController')->only([
        'index', 'edit', 'update'
    ]);
    // Route::get('/sms', function () {
    //     Nexmo::message()->send([
    //         'to'   => '6282247973615',
    //         'from' => '15556666666',
    //         'text' => 'SMS Send with Nexmo'
    //     ]);
    // });
    Route::fallback(function(){
        abort(404);
    });
});
