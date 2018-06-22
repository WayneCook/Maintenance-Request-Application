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
    return view('home');
});

route::post('admin/workOrder/update/{id}', 'OrdersController@update');
route::post('admin/workOrder/delete/{id}', 'OrdersController@destroy');
route::post('admin/workOrder/store', 'OrdersController@store');
route::get('admin/workOrder/{id}', 'OrdersController@show');


route::get('admin/workOrders', 'OrdersController@initial')->name('initial');
route::get('admin', 'OrdersController@index')->name('admin');


Route::get('login/facebook', 'Auth\FacebookLoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\FacebookLoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/private-policy', function(){
  return view('private/privatePolicy');
});

Route::get('image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);

Route::post('image-upload',['as'=>'image.admin.post','uses'=>'ImageUploadController@adminImageUploadPost']);
Route::get('image-upload',['as'=>'image.admin.delete','uses'=>'ImageUploadController@imageDelete']);

Auth::routes();

Route::resource('users', 'UserController');

Route::resource('workOrders', 'workOrderController');
