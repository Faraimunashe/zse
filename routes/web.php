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

    Route::get('/admin/dividends', 'App\Http\Controllers\admin\DividendController@index')->name('admin-dividends');

    Route::get('/admin/brokers', 'App\Http\Controllers\admin\BrokerController@index')->name('admin-brokers');
    Route::get('/admin/add-broker', 'App\Http\Controllers\admin\BrokerController@broker')->name('admin-broker-add');
    Route::post('/admin-add-broker', 'App\Http\Controllers\admin\BrokerController@add')->name('admin-add-broker');
});

Route::group(['middleware' => ['auth', 'role:broker']], function () {
    Route::get('/broker/dashboard', 'App\Http\Controllers\broker\DashboardController@index')->name('broker-dashboard');

    Route::get('/broker/portifolio', 'App\Http\Controllers\broker\PortifolioController@index')->name('broker-portifolio');
    Route::get('/broker/update-portifolio', 'App\Http\Controllers\broker\PortifolioController@update_portifolio')->name('broker-add-portifolio');
    Route::post('/broker/add-portifolio', 'App\Http\Controllers\broker\PortifolioController@update')->name('broker-update-portifolio');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/home', 'App\Http\Controllers\user\DashboardController@index')->name('user-dashboard');

    Route::get('/dividend', 'App\Http\Controllers\user\DividendController@index')->name('user-dividend');

    Route::get('/portifolios', 'App\Http\Controllers\user\PortifolioController@index')->name('user-portifolios');
    Route::get('/confirm-buying/{portifolio_id}', 'App\Http\Controllers\user\PortifolioController@confirm')->name('user-confirm-buying');
    Route::post('/buy-share', 'App\Http\Controllers\user\PortifolioController@buy')->name('user-buy-share');

    Route::get('/my-shares', 'App\Http\Controllers\user\ShareController@index')->name('user-shares');
    Route::get('/share-certificate/{share_id}', 'App\Http\Controllers\user\ShareController@certificate')->name('user-share-certificate');

    Route::get('/my-details', 'App\Http\Controllers\user\InvesterController@index')->name('user-details');
    Route::post('/add-details', 'App\Http\Controllers\user\InvesterController@add')->name('user-add-detail');
});

require __DIR__.'/auth.php';
