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

Route::get('/', 'Shop@index')->name('main');
Route::get('/success', 'Shop@success');
Route::get('/login', 'LoginController@login');
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
    Route::get('profile/image', 'AdminApi@displayAdminImage')->name('admin.profile.image');
    Route::post('profile/image', 'AdminApi@uploadAdminImage');
    Route::get('/orders', function () {
      return view('admin.orders');
    });

    Route::get('/options', 'Admin@options');
    Route::get('/notifications', 'Admin@notifications')->name('notifications');
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

  Route::get('/clear', function() {
  Artisan::call('config:cache');
  Artisan::call('cache:clear');
    return response()->json(
      [
        'config:cache' => true
      ]
    );
  });
});
Route::get('/telegram/newUser', function () {
  $user = [
    'update_id' => 261995962,
    'date' => 1590690940,
    'chat_id' => 134791860,
    'first_name' => 'Сергей',
    'username' => 'sergey_kuzmenko'
  ];
  return response()->json($user);
});
Route::get('/telegram/webhook/set', 'TelegramNotification@setWebhook')->name('telegram.webhook.set');
Route::get('/telegram/webhook/info', 'TelegramNotification@infoWebhook')->name('telegram.webhook.info');
Route::get('/telegram/webhook/remove', 'TelegramNotification@removeWebhook')->name('telegram.webhook.remove');
Route::post('/telegram/webhook', 'TelegramNotification@handler')->name('telegram.webhook');