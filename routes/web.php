<?php


Route::get('/', function () { return view('home'); });


route::post('admin/register', 'Auth\adminRegisterController@registerUser');


//Admin routes
Route::group(['middleware' => ['admin']], function () {


    route::post('admin/workOrder/update/{id}', 'OrdersController@update');
    route::post('admin/workOrder/delete/{id}', 'OrdersController@destroy');
    route::get('admin/workOrder/{id}', 'OrdersController@show');
    route::get('admin/workOrders', 'OrdersController@initial')->name('initial');
    Route::resource('users', 'UserController');
  });



route::post('admin/workOrder/store', 'OrdersController@store');
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



Route::resource('workOrders', 'workOrderController');


//Basic user Route
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dash');

Route::get('work_order/create', function () {
    return view('work_orders.create');
})->middleware('auth')->name('user_work_order');



route::get('admin', function(){
  return view('admin');
})->middleware('admin')->name('admin');


Route::get('send_test_email', function(){
	Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
	{
    $message->subject('Mailgun and Laravel are awesome!');
		$message->from('postmaster@mg.whisperingloop.com', 'Whispering Fountians');
		$message->to('waynedemetra@gmail.com');

	});
});


route::get('user/events', 'EventController@userIndex')->name('showEvents');
Route::resource('events', 'EventController');
