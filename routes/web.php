<?php


Route::get('/', function () { return view('home'); });
Route::post('admin/register', 'Auth/adminRegisterController@registerUser');



//Admin routes
  Route::group(['middleware' => ['admin']], function () {

    Route::post('admin/workOrder/update/{id}', 'OrdersController@update');
    Route::post('admin/workOrder/delete/{id}', 'OrdersController@destroy');
    Route::resource('users', 'UserController');

  });


  Route::group(['middleware' => ['maintenance']], function () {

    Route::get('admin/workOrder/{id}', 'OrdersController@show');
    Route::post('workOrder/updateStatus', 'OrdersController@updateStatus');
    Route::get('admin/workOrders', 'OrdersController@initial')->name('initial');
    Route::resource('workOrders', 'workOrderController');

  });


  // Route::get('login/facebook', 'Auth\FacebookLoginController@redirectToProvider')->name('login.facebook');
  // Route::get('login/facebook/callback', 'Auth\FacebookLoginController@handleProviderCallback');



Auth::routes();

//Basic user Route
Route::group(['middleware' => ['auth']], function () {

    Route::get('work_order/create', function () { return view('work_orders.create'); })->middleware('auth')->name('user_work_order');
    Route::get('admin', function(){ return view('admin'); })->middleware('admin')->name('admin');
    Route::get('maintenance', function(){ return view('maintenance'); })->middleware('maintenance')->name('maintenance');
    Route::get('dashboard', function () { return view('dashboard'); })->middleware('role_redirect')->name('dash');

    Route::get('profile/{id}', 'UserController@profile')->name('profile');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/private-policy', function(){ return view('private/privatePolicy'); });
    Route::get('image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);
    Route::post('image-upload',['as'=>'image.admin.post','uses'=>'ImageUploadController@adminImageUploadPost']);
    Route::get('image-upload',['as'=>'image.admin.delete','uses'=>'ImageUploadController@imageDelete']);

    Route::get('signup/check', 'SignupController@check');
    Route::get('user/events', 'EventController@userIndex')->name('showEvents');
    Route::resource('events', 'EventController');
    Route::resource('signup', 'SignupController');

    Route::post('admin/workOrder/store', 'OrdersController@store');
});
