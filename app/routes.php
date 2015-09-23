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

Route::when( '*', 'csrf', array( 'post' ) );

// Default Home Page ...
Route::get( '/', [ 'as' => 'home', 'uses' => 'AuthController@index' ] );

/**
 * Normal Authentication ...
 */
Route::post( 'login', [ 'as' => 'login', 'uses' => 'AuthController@login' ] );
Route::get( 'logout', [ 'as' => 'logout', 'uses' => 'AuthController@logout' ] );

Route::get( 'facebook-login', [ 'as' => 'facebook-login', 'uses' => 'AuthController@facebookLogin' ] );
Route::get( 'github-login', [ 'as' => 'github-login', 'uses' => 'AuthController@githubLogin' ] );

Route::post( 'register', [ 'as' => 'register', 'uses' => 'AuthController@register' ] );

/**
 * Authenticated Routes
 */
Route::group( [ 'before' => 'auth' ],
	function() {
		/**
		 * We can use a resource here, 
		 * but for me it is good to declare verbs that you only what want to use
		 */
		Route::get( 'contacts', [ 'as' => 'contacts', 'uses' => 'ContactsController@index' ] );
		Route::post( 'contacts', [ 'as' => 'post-contacts', 'uses' => 'ContactsController@index' ] );
		Route::post( 'edit-contact', [ 'as' => 'edit-contact', 'uses' => 'ContactsController@edit' ] );
		Route::post( 'save-contact/{contactId}', [ 'as' => 'save-contact', 'uses' => 'ContactsController@store' ] );
		Route::post( 'delete-contact', [ 'as' => 'delete-contact', 'uses' => 'ContactsController@destroy' ] );
		Route::post( 'search-contacts', [ 'as' => 'searchcontacts', 'uses' => 'ContactsController@search' ] );
	}
);