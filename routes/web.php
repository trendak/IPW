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

Route::get('/', 'ItemsController@index');
Route::get('/contact', 'PagesController@contact');
Route::get('/about', 'PagesController@about');
Route::get('/categories', 'ItemsController@categories');
Route::get('/categories/{id}', 'ItemsController@showcategory');
Route::get('/profile', 'UserController@index');
Route::get('/violation_of_item/{id}', 'ItemsController@violation');
Route::get('/violation_of_exchange/{id}', 'ItemsController@violation_exchange');


Route::group(['middleware' => ['web']], function ()
{
	Route::get('/exchange/{id}', 'ItemsController@exchange');
	Route::get('/offer_exchange', 'ItemsController@offerexchange');
	Route::resource('items','ItemsController');
	Route::get('admin/users','AdminController@users');
	Route::get('admin/items','AdminController@items');
	Route::get('admin/violations','AdminController@violations');
		Route::get('admin/violations','AdminController@violations');
	Route::get('profile/{id}','OpinionsController@show');
	Route::get('opinions/create/{id}','OpinionsController@create');
	Route::resource('opinions','OpinionsController');
	Route::post('violation','ItemsController@violationsave');
	Route::post('violation_of_exchange','ItemsController@violationsave_exchange');
	Route::post('itemsent/{id}','ItemsController@itemsent');
	Route::post('item_received/{id}','ItemsController@item_received');
	Route::resource('profile','UserController');
	Route::get('/exchangesave/{id}/{pid}', 'ItemsController@exchange_save');
	Route::get('/offer_exchange/{id}', 'ItemsController@assent_offerexchange');
	Route::get('/offer_exchange/status/{id}', 'ItemsController@statusexchange');
	Route::get('/my_messages/create/{id}', 'MessagesController@create');
	Route::post('/my_messages/create', 'MessagesController@store');
	Route::get('/my_messages', 'MessagesController@mymessages');
	Route::get('/my_messages/{id}', 'MessagesController@show');
	Route::post('/my_messages/', 'MessagesController@savemessage');
	Route::get('/opinions/create{id}', 'OpinionsController@create');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('file','ItemsController@store')->name('upload.file');
