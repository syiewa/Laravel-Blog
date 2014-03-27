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
Route::get('admin', function() {
            return Redirect::to('login');
        });
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
Route::get('archives', function() {
            return Redirect::to('/');
        });
Route::get('tags', function() {
            return Redirect::to('/');
        });
Route::get('/', array('as' => 'home', 'uses' => 'PostController@home'));
Route::bind('slug', function($value, $route) {
            $slug = Artikel::where('slug', '=', $value)->with(array('comment' => function($query) {
                            $query->orderBy('lft', 'asc')->orderBy('created_at', 'desc');
                        }))->first();
            return $slug;
        });
Route::get('artikel/{slug}', array('as' => 'artikel', 'uses' => 'PostController@show'));
Route::get('tags/{tags}', array('as' => 'tags', 'uses' => 'PostController@tags_show'));
Route::bind('year', function($value, $route) {
            return Artikel::where(\DB::raw('DATE_FORMAT(pubdate, "%Y")'), '=', $value)->orderBy('pubdate', 'desc');
        });
Route::bind('month', function($value, $route) {
            $value = date('m', strtotime($value));
            return Artikel::where(\DB::raw('DATE_FORMAT(pubdate, "%m")'), '=', $value)->orderBy('pubdate', 'desc');
        });
Route::get('archives/{year}', array('as' => 'year', 'uses' => 'PostController@archives'));
Route::get('archives/{year}/{month?}', array('as' => 'month', 'uses' => 'PostController@archives'));
Route::post('comment/store', array('as' => 'store', 'uses' => 'CommentController@store'));

