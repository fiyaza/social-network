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

// Home
Route::get('/', [
	'uses' => '\Socialnetwork\Http\Controllers\HomeController@index',
	'as' => 'home',
]);

// Authentication
Route::get('/signup', [
	'uses' => '\Socialnetwork\Http\Controllers\AuthController@getSignup',
	'as' => 'auth.signup',
	'middleware' => ['guest'],
]);

Route::post('/signup', [
	'uses' => '\Socialnetwork\Http\Controllers\AuthController@postSignup',
	'middleware' => ['guest'],
]);

Route::get('/signin', [
	'uses' => '\Socialnetwork\Http\Controllers\AuthController@getSignin',
	'as' => 'auth.signin',
	'middleware' => ['guest'],
]);

Route::post('/signin', [
	'uses' => '\Socialnetwork\Http\Controllers\AuthController@postSignin',
	'middleware' => ['guest'],
]);

Route::get('/signout', [
	'uses' => '\Socialnetwork\Http\Controllers\AuthController@getSignout',
	'as' => 'auth.signout',
]);

// Search
Route::get('/search', [
	'uses' => '\Socialnetwork\Http\Controllers\SearchController@getResults',
	'as' => 'search.results',
]);

// User Profile
Route::get('/user/{username}', [
	'uses' => '\Socialnetwork\Http\Controllers\ProfileController@getProfile',
	'as' => 'profile.index',
]);

Route::get('/profile/edit', [
	'uses' => '\Socialnetwork\Http\Controllers\ProfileController@getEdit',
	'as' => 'profile.edit',
	'middleware' => ['auth'],
]);

Route::post('/profile/edit', [
	'uses' => '\Socialnetwork\Http\Controllers\ProfileController@postEdit',
	'middleware' => ['auth'],
]);

// Friends
Route::get('/friends', [
	'uses' => '\Socialnetwork\Http\Controllers\FriendController@getIndex',
	'as' => 'friend.index',
	'middleware' => ['auth'],
]);

Route::get('/friends/add/{username}', [
	'uses' => '\Socialnetwork\Http\Controllers\FriendController@getAdd',
	'as' => 'friend.add',
	'middleware' => ['auth'],
]);

Route::get('/friends/accept/{username}', [
	'uses' => '\Socialnetwork\Http\Controllers\FriendController@getAccept',
	'as' => 'friend.accept',
	'middleware' => ['auth'],
]);

Route::post('/friends/delete/{username}', [
	'uses' => '\Socialnetwork\Http\Controllers\FriendController@postDelete',
	'as' => 'friend.delete',
	'middleware' => ['auth'],
]);

// Statuses
Route::post('/status', [
	'uses' => '\Socialnetwork\Http\Controllers\StatusController@postStatus',
	'as' => 'status.post',
	'middleware' => ['auth'],
]);

Route::post('/status/{statusId}/reply', [
	'uses' => '\Socialnetwork\Http\Controllers\StatusController@postReply',
	'as' => 'status.reply',
	'middleware' => ['auth'],
]);

Route::get('/status/{statusId}/like', [
	'uses' => '\Socialnetwork\Http\Controllers\StatusController@getLike',
	'as' => 'status.like',
	'middleware' => ['auth'],
]);