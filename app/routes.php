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
// Admin Routes
Route::get('admin', 'UsersController@login');
Route::group(array('prefix' => 'admin', 'before' => 'check'), function() {
    // main page for the admin section (app/views/admin/dashboard.blade.php)
    Route::resource('users', 'UsersController');
    Route::resource('artikel', 'PostController');
    Route::resource('links', 'LinkController');
    Route::resource('comments', 'CommentController');
});
Route::get('login', 'UsersController@login');
Route::post('login', array('https' => false, 'before' => 'csrf', 'as' => 'postuserlogin', 'uses' => 'UsersController@doLogin'));
Route::get('logout', array('as' => 'frontlogout', 'uses' => 'UsersController@logout'));

// Front Routes
Route::get('/', array('as' => 'home', 'uses' => 'PostController@home'));
Route::bind('slug', function($value, $route) {
    $slug = Artikel::where('slug', '=', $value)->first();
    return $slug;
});
Route::bind('tags', function ($value, $route) {
    if ($value) {
        $tags = Tags::whereHas('artikel', function($q) {
                    $q->where('slug', '=', 'game');
                })->first();
        if ($tags) {
            return $tags;
        }
        App::abort(404);
    }
});
Route::get('artikel/{slug}', array('as' => 'artikel', 'uses' => 'PostController@show'));
Route::get('tags/{tags}', array('as' => 'tags', 'uses' => 'PostController@tags_show'));

