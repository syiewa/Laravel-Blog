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
Route::get('artikel', function() {
            return Redirect::to('/');
        });
Route::get('/', array('as' => 'home', 'uses' => 'PostController@home'));
Route::bind('slug', function($value, $route) {
            $slug = Artikel::where('slug', '=', $value)->with(array('comment' => function($query) {
                            $query->orderBy('lft', 'asc')->orderBy('created_at', 'desc');
                        }))->first();
            return $slug;
        });
Route::get('artikel/{slug}', array('as' => 'artikel', 'before' => 'counter', 'uses' => 'PostController@show'));
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

// sitemaps
Route::get('sitemap_posts', function() {

            // create new sitemap object
            $sitemap_posts = App::make("sitemap");
            // set cache (key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean))
            // by default cache is disabled
            // add item to the sitemap (url, date, priority, freq)
            // get all posts from db
            $sitemap_posts->setCache('laravel.sitemap_posts', 3600);
            $posts = Artikel::live()->orderBy('pubdate', 'desc')->get();
            // add every post to the sitemap
            foreach ($posts as $post) {
                $sitemap_posts->add(URL::to("artikel/{$post->slug}"), $post->pubdate, '1', 'weekly');
            }
            // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
            return $sitemap_posts->render('xml');
        });
Route::get('sitemap_tags', function() {
            // create sitemap
            $sitemap_tags = App::make("sitemap");

            // set cache
            $sitemap_tags->setCache('laravel.sitemap_tags', 3600);

            // add items
            $tags = Tags::groupBy('slug')->get();

            foreach ($tags as $tag) {
                $sitemap_tags->add($tag->slug, null, '0.5', 'weekly');
            }

            // show sitemap
            return $sitemap_tags->render('xml');
        });
Route::get('sitemap', function() {
            // create sitemap
            $sitemap = App::make("sitemap");

            // set cache
            // add sitemaps (loc, lastmod (optional))
            $sitemap->add(URL::to('/'), date('d-m-Y h:i:s'), '1.0', 'daily');
            $sitemap->addSitemap(URL::to('sitemap_posts'));
            $sitemap->addSitemap(URL::to('sitemap_tags'));

            // show sitemap
            return $sitemap->render('sitemapindex');
        });
Route::get('/rss', function() {
            $feed = Rss::feed('2.0', 'UTF-8');
            $feed->channel(array('title' => 'Arnosa.net', 'description' => 'Nothing is True , Everything is Permitted', 'link' => 'http://arnosa.net/'));
            $posts = Artikel::live()->orderBy('pubdate', 'desc')->paginate(5);
            // add every post to the sitemap
            foreach ($posts as $post) {
                $feed->item(array('title' => $post->judul, 'description|cdata' =>  $post->isi, 'link' => 'http://arnosa.net/artikel/' . $post->slug));
            }

            return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
        });