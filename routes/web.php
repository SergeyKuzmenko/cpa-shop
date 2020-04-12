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
Route::get('/login', function () {
  return view('login');
});

Route::post('/login', 'LoginController@authenticate')->name('login');

Route::get('/privacy', function () {
  return view('privacy');
});

Route::prefix('api')->group(function () {
  Route::post('/newOrder', 'ShopApi@newOrder');
});

Route::group(['middleware' => 'auth'], function () { //
  Route::get('/getUpdates', 'Shop@getUpdates');
  Route::get('/getParams', 'Shop@getParams');
  Route::prefix('admin')->group(function () {
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/', function () {
      return view('admin.dashboard');
    });
    Route::get('profile', 'Admin@profile');
    Route::get('/orders', function () {
      return view('admin.orders');
    });

    Route::get('/options', 'Admin@options');
    Route::get('/notifications', 'Admin@notifications');
    Route::get('/analytics', 'Admin@analytics');

    Route::prefix('api')->group(function () {
      // Main page
      Route::get('/getOrders', 'AdminApi@getOrders');
      Route::get('/getDashboardInfo', 'AdminApi@getDashboardInfo');

      // Profile
      Route::post('/profile/changeProfile', 'LoginController@changeProfile');

      // Orders
      Route::post('/setOrderState', 'AdminApi@setOrderState');

      //Options
      Route::get('/getOptions', 'AdminApi@getOptions');
      Route::post('/saveOptions', 'AdminApi@saveOptions');

      // Notifications
      Route::post('/notifications', 'AdminApi@notifications');

      // Analytics
      Route::post('/saveAnalytics', 'AdminApi@saveAnalytics');
    });
  });
});