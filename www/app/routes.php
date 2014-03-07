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

Route::get( '/', 'HomeController@showHome');

Route::get( '/getMovies', function() {
	return Response::json( Movie::all() );
});

Route::get( '/getSections', function() {
	return Response::json( Section::all() );
});

Route::get( '/updateFromPlex', 'HomeController@updateFromPlex' );
Route::get( '/getPlexData', 'HomeController@getPlexData' );

// Route::get( '/getPlexData')

// Route::get( '/getPlex', function() {
// 	// $plex = DB::connection( 'sqlite' )->select( 'SELECT title FROM metadata_items' );
// 	// echo '<pre>';print_r( $plex );
// });





// Route::get('/', function()
// {
// 	return View::make('hello');
// });