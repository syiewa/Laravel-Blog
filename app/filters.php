<?php

/*
  |--------------------------------------------------------------------------
  | Application & Route Filters
  |--------------------------------------------------------------------------
  |
  | Below you will find the "before" and "after" events for the application
  | which may be used to do any work before or after a request into your
  | application. Here you may also register your custom route filters.
  |
 */

App::before(function($request) {
            //
        });


App::after(function($request, $response) {
            //
        });

/*
  |--------------------------------------------------------------------------
  | Authentication Filters
  |--------------------------------------------------------------------------
  |
  | The following filters are used to verify that the user of the current
  | session is logged into this application. The "basic" filter easily
  | integrates HTTP Basic authentication for quick, simple checking.
  |
 */

Route::filter('check', function() {
            if (!Sentry::check())
                return Redirect::to('login');
        });

Route::filter('counter', function() {
            $ip = Request::getClientIp();

            // Check if visitor exists
            $post_id = Artikel::where('slug', '=', Request::segment(2))->first()->id;
            $visitor = Counter::where('post_id', '=', $post_id)->orderBy('created_at')->first();

            if ($visitor > '0') {
                // User exists, Check time difference from updated_at (last_active)

                $then = strtotime($visitor->updated_at);
                $now = strtotime(date("Y-m-d H:i:s"));

                $difference = ($now - $then);

                if ($difference > '1200') {
                    $visitor = new Counter();
                    $visitor->ip = $ip;
                    $visitor->post_id = $post_id;
                    $post = Artikel::find($post_id);
                    $visitor->posts()->associate($post);
                    $visitor->save();
                } else {
                    // Otherwise update the current visitor
                    $visitor->post_id = $post_id;
                    $post = Artikel::find($post_id);
                    $visitor->posts()->associate($post);
                    $visitor->save();
                }
            } else {
                // New visitor, create them
                $visitor = new Counter();
                $visitor->ip = $ip;
                $visitor->post_id = $post_id;
                $post = Artikel::find($post_id);
                $visitor->posts()->associate($post);
                $visitor->save();
            }
        });

Route::filter('auth', function() {
            if (Auth::guest())
                return Redirect::guest('login');
        });


Route::filter('auth.basic', function() {
            return Auth::basic();
        });

/*
  |--------------------------------------------------------------------------
  | Guest Filter
  |--------------------------------------------------------------------------
  |
  | The "guest" filter is the counterpart of the authentication filters as
  | it simply checks that the current user is not logged in. A redirect
  | response will be issued if they are, which you may freely change.
  |
 */

Route::filter('guest', function() {
            if (Auth::check())
                return Redirect::to('/');
        });

/*
  |--------------------------------------------------------------------------
  | CSRF Protection Filter
  |--------------------------------------------------------------------------
  |
  | The CSRF filter is responsible for protecting your application against
  | cross-site request forgery attacks. If this special token in a user
  | session does not match the one given in this request, we'll bail.
  |
 */

Route::filter('csrf', function() {
            if (Session::token() != Input::get('_token')) {
                throw new Illuminate\Session\TokenMismatchException;
            }
        });