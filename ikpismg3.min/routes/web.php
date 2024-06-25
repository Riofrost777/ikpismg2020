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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');

});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('image','ProfileController@index_upload');
	Route::post('profile/avatar', ['as' => 'profile.update_avatar', 'uses' => 'ProfileController@update_avatar']);
});

Route::group(['middleware' => 'auth'], function() {
	Route::resource('event', 'EventController', ['except' => ['show']]);
});

Route::group(['middleware' => 'auth'], function() {
	Route::resource('articles', 'ArticleController', ['except' => ['show']]);
	Route::get('articles/setup', ['as' => 'articles.index', 'uses' => 'ArticleController@index']);
	Route::post('articles/update/{id}', ['as' => 'articles.update', 'uses' => 'ArticleController@update']);
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('user/event', ['as' => 'user.event', 'uses' => 'JoinedeventController@index']);
	Route::post('user/event/invoice', ['as' => 'user.event.invoice', 'uses' => 'JoinedeventController@upload_invoice']);
	Route::post('user/event/attachment', ['as' => 'user.event.attachment', 'uses' => 'JoinedeventController@upload_attachment']);
	Route::get('user/ppl', ['as' => 'user.ppl', 'uses' => 'JoinedeventController@ppl_report']);
	Route::delete('user/event/delete', ['as' => 'user.event.destroy', 'uses' => 'JoinedeventController@deleteJoinedEvent']);
	Route::get('user/{user_id}/event/{event_id}/add', ['as' => 'user.event.add', 'uses' => 'JoinedeventController@add']);
	Route::get('user/{user_id}/event/{event_id}/update', ['as' => 'user.event.update', 'uses' => 'JoinedeventController@update']);
	Route::get('event/attendance', [ 'as' => 'event.attendance', 'uses' => 'JoinedeventController@attendance']);
	Route::get('event/attendance/list/{event_id}', ['as' => 'event.list', 'uses' => 'JoinedeventController@list']);
});

Route::get('/guest', function () {
		return view('guest.auth-guest');
	})->name('auth.guest');

Route::get('view-data', 'AuthorizationController@viewData');
Route::get('create-data', 'AuthorizationController@createData');
Route::get('edit-data', 'AuthorizationController@editData');
Route::get('update-data', 'AuthorizationController@updateData');
Route::get('delete-data', 'AuthorizationController@deleteData');

