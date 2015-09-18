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

// Default Root Page ...
Route::get( '/', [ 'as' => 'home', 'uses' => 'AuthController@index' ] );

/**
 * Normal Authentication ...
 */
Route::post( '/login', 'AuthController@login' );
Route::get( '/logout', 'AuthController@logout' );

Route::get( '/facebook-login', [ 'as' => 'facebook-login', 'uses' => 'AuthController@facebookLogin' ] );
Route::get( '/github-login', [ 'as' => 'github-login', 'uses' => 'AuthController@githubLogin' ] );

Route::post( '/register', 'AuthController@register' );

/**
 * Authenticated Routes
 */
Route::group( [ 'before' => 'auth' ],
	function() {

		/**
		 * We can use a resource here, 
		 * but it is best to declare verbs that you only what want to use
		 */
		Route::get( 'contacts', [ 'as' => 'contacts', 'uses' => 'ContactsController@index' ] );
	}
);
