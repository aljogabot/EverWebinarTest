<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{

		/*$fb = OAuth::consumer( 'Facebook', 'http://test.local/' );

		$code = Input::get( 'code' );

		if( $code ) {

			$token = $fb->requestAccessToken( $code );
			$result = json_decode( $fb->request( '/me?fields=id,name,email,picture,link' ), TRUE );

			dd( $result );

		}

		$url = $fb->getAuthorizationUri();*/

		/*$bitbucket = OAuth::consumer( 'Bitbucket', 'http://test.local/' );

		$token = Input::get( 'oauth_token' );
    	$verify = Input::get( 'oauth_verifier' );

		if ( !empty( $token ) && !empty( $verify ) ) {

	        // This was a callback request from twitter, get the token
	        $token = $bitbucket->requestAccessToken( $token, $verify );

	        // Send a request with it
	        $result = json_decode( $bitbucket->request( 'user' ), true );

	        $result = json_decode( $bitbucket->request( 'users/' . $result[ 'user' ][ 'username' ] . '/emails' ), TRUE );

	        //Var_dump
	        //display whole array().
	        echo '<pre>';
	        dd($result);

    	}

		$reqToken = $bitbucket->requestRequestToken();
		$url = $bitbucket->getAuthorizationUri(array('oauth_token' => $reqToken->getRequestToken()));*/

		$github = OAuth::consumer( 'Github', 'http://test.local/' );

		$code = Input::get( 'code' );

		if( $code ) {

			$token = $github->requestAccessToken( $code );
			$result = json_decode( $github->request( 'user' ), TRUE );

			echo '<pre>';
			dd( $result );

		}

		$url = $github->getAuthorizationUri();

		return View::make( 'hello', [ 'name' => 'Bogart', 'url' => $url ] );
	}

}
