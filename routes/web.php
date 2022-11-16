<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::group(['middleware', ['auth', 'role:admin']], function(){
    Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@index')->name('admin-dashboard');

    Route::get('/admin/users', 'App\Http\Controllers\admin\UserController@index')->name('admin-users');

    Route::get('/admin/brokers', 'App\Http\Controllers\admin\BrokerController@index')->name('admin-brokers');
    Route::get('/admin/add-broker', 'App\Http\Controllers\admin\BrokerController@broker')->name('admin-broker-add');
    Route::post('/admin-add-broker', 'App\Http\Controllers\admin\BrokerController@add')->name('admin-add-broker');
});

Route::group(['middleware' => ['auth', 'role:brocker']], function () {
    Route::get('/broker/dashboard', 'App\Http\Controllers\broker\DashboardController@index')->name('broker-dashboard');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/home', 'App\Http\Controllers\user\DashboardController@index')->name('user-dashboard');
});

require __DIR__.'/auth.php';
