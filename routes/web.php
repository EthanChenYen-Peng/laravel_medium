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

Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@home')->name('home');
    Route::get('/me/stories/{state}', 'OwnPostController@show')->name('own-posts-show');

    Route::get('@{user:username}/{state?}', 'UserProfileController@index')->name('profile-index')->where('state', "is_recommended");
    Route::get('@{user:username}/edit', 'UserProfileController@edit')->name('profile-edit');
    Route::patch('@{user:username}/', 'UserProfileController@update')->name('profile-update');

    Route::get('/@{user:username}/{post:slug}', 'PostController@show')->name('posts-show');
    // Route::get('/@{user:username}', 'PostController@index')->name('posts-index');
    Route::get('/new-story', 'PostController@create')->name('post-create');
    // Comments
    Route::post("/{user:username}/{post:id}", 'CommentController@store')->name('comment-store');
    // Follow
    Route::post('@{user:username}/follow', 'FollowController@create')->name('follow');
    Route::get('/api/following/{user1}/{user2}', 'FollowController@checkFollow')->name('check-follow');


    Route::post('/api/{post:id}/clap', "ClapController@store")->name('clap-store');

    Route::get('/api/{post:id}/comments', "CommentController@index")->name('comment-index');
    // User 
});
