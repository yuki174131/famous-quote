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

Route::get('/', 'CategoriesController@index');
 
 //ユーザー登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン認証
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('logout','Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['show']]);
    
    Route::group(['prefix' => 'users/{id}'], function() {
       Route::post('follow', 'CategoryFollowController@store')->name('categories.follow');
       Route::delete('unfollow', 'CategoryFollowController@destroy')->name('categories.unfollow');
       Route::get('followings', 'UsersController@followings')->name('users.followings');
       Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    
    Route::group(['prefix' => 'posts/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite','FavoritesController@destroy')->name('favorites.unfavorite');
    });
    
    Route::get('category/{category_id}/posts','Category\PostsController@index')->name('category.posts.index'); 
    Route::post('category/{category_id}/posts','Category\PostsController@store')->name('category.posts.store');
    Route::get('category/{category_id}/posts/edit','Category\PostsController@edit')->name('category.posts.edit');
    Route::delete('category/{category_id}/posts','Category\PostsController@destroy')->name('category.posts.destroy');
    
    Route::put('posts/{post_id}','Category\PostsController@update')->name('category.posts.update');
    
    Route::get('posts','PostsController@index')->name('posts.index');
    Route::get('posts/follow','PostsController@follow_index')->name('follow.posts.index');

    Route::get('ranking','PostsController@ranking_index')->name('ranking.index');
    
});

