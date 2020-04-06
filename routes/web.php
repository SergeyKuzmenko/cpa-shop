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

Route::get('/', 'Shop@index');
Route::get('/success', 'Shop@success');

Route::get('/privacy', function () {
  return view('privacy');
});

Route::prefix('api')->group(function () {
  Route::post('/newOrder', 'ShopApi@newOrder');
});

Route::get('/tlg', 'AdminApi@telegramBotCheckConnection');

Route::group(['middleware' => 'basicAuth'], function () {
  Route::get('/getUpdates', 'Shop@getUpdates');
  Route::get('/getParams', 'Shop@getParams');
  Route::prefix('admin')->group(function () {
    Route::get('/', function () {
      return view('admin.dashboard');
    });
    Route::get('profile', function () {
      return view('admin.profile');
    });
    Route::get('/orders', function () {
      return view('admin.orders');
    });

    Route::get('/options', 'Admin@options');
    Route::get('/notifications', 'Admin@notifications');
    Route::get('/analytics', 'Admin@analytics');

    Route::prefix('api')->group(function () {
      Route::get('/getOrders', 'AdminApi@getOrders');
      Route::get('/getOptions', 'AdminApi@getOptions');
      Route::post('/saveOptions', 'AdminApi@saveOptions');
      Route::post('/setOrderState', 'AdminApi@setOrderState');
      Route::post('/notifications', 'AdminApi@notifications');
    });
  });
});