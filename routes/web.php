<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;






//Admin
Route::prefix('admin')->middleware('App\Http\Middleware\CheckLogin')->group(function () {
    Route::get('/home', 'App\Http\Controllers\Admin\HomeController@index')->name('home');
    Route::resources([
        'sinhvien' => 'App\Http\Controllers\Admin\SinhVienController',
        'diem' => 'App\Http\Controllers\Admin\DiemController',
        'khoa' => 'App\Http\Controllers\Admin\KhoaController',
        'monhoc' => 'App\Http\Controllers\Admin\MonhocController',
        'lop' => 'App\Http\Controllers\Admin\LopController',
        'giangvien' => 'App\Http\Controllers\Admin\GiangvienController',
        'user' => 'App\Http\Controllers\Admin\UserController',
        'accountStudent' => 'App\Http\Controllers\Admin\AccountStudentController'
    ]);
    
    

    
});


//Account
Route::get('login', 'App\Http\Controllers\Admin\AccountController@showLogin')->name('login');
Route::get('register', 'App\Http\Controllers\Admin\AccountController@showRegister')->name('register');
Route::get('logout', 'App\Http\Controllers\Admin\AccountController@logout')->name('logout');

Route::post('login', 'App\Http\Controllers\Admin\AccountController@login')->name('checkLogin');
Route::post('register', 'App\Http\Controllers\Admin\AccountController@register')->name('checkRegister');
//Forgot password
Route::post('forgotpassword','App\Http\Controllers\Admin\AccountController@postforgotPassword')->name('forgotpassword');
Route::get('forgotpassword','App\Http\Controllers\Admin\AccountController@forgotPassword')->name('forgot.show');
Route::get('resetpassword/{id}','App\Http\Controllers\Admin\AccountController@resetPassword')->name('resetpassword');
Route::post('resetpassword/{id}','App\Http\Controllers\Admin\AccountController@changePassword')->name('changePassword');