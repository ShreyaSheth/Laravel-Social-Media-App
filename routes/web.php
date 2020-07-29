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

// Route::group(['middleware' = ['web']], function() {
	Route::get('/', function () {
    	return view('welcome');
	})->name('home');

	Route::post('/signup', [
		'uses' => 'UserController@SignUp',
		'as' => 'signup'
	]);

	Route::post('/signin', [
		'uses' => 'UserController@SignIn',
		'as' => 'signin'
	]);

	Route::get('/account',[
		'uses' => 'UserController@Account',
		'as' => 'account'
	]);

	Route::post('/updateaccount',[
		'uses' => 'UserController@SaveAccount',
		'as' => 'account.save'
	]);

	Route::get('/userimage/{filename}',[
		'uses' => "UserController@UserImage",
		'as' => 'account.image'
	]);

	Route::get('/logout',[
		'uses' => 'UserController@Logout',
		'as' => 'logout'
	]);

	Route::get('/dashboard', [
		'uses' => 'PostController@Dashboard',
		'as' => 'dashboard',
		'middleware' => 'auth'
	]);

	Route::post('/createpost',[
		'uses' => 'PostController@CreatePost',
		'as' => 'post.create',
		'middleware' => 'auth'
	]);

	Route::get('/delete-post/{post_id}',[
		'uses' =>'PostController@DeletePost',
		'as' => 'post.delete',
		'middleware' => 'auth'
	]);

	Route::post('/edit', [
		'uses' => 'PostController@EditPost',
		'as' => 'edit'
	]);

	Route::post('/like', [
		'uses' => 'PostController@LikePost',
		'as' => 'like'
	]);
// });
