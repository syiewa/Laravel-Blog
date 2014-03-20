<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */
Route::get('/', 'UsersController@login');
Route::get('admin', 'UsersController@login');
Route::model('Artikel', 'artikel');
Route::group(array('prefix' => 'admin','before' => 'check'), function() {
    // main page for the admin section (app/views/admin/dashboard.blade.php)
    Route::resource('users', 'UsersController');
    Route::resource('artikel', 'PostController');
    Route::resource('links', 'LinkController');
    Route::resource('comments', 'CommentController');
});
Route::get('login', 'UsersController@login');
Route::post('login', array('https' => false,'before'=>'csrf','as' => 'postuserlogin', 'uses' => 'UsersController@doLogin'));
Route::get('logout', array('as' => 'frontlogout', 'uses' => 'UsersController@logout'));