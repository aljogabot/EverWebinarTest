<?php

use Company\AuthProviders\Github as GithubAuthProvider;
use Company\AuthProviders\Facebook as FacebookAuthProvider;
use Company\Repositories\UserRepository;

class AuthController extends \BaseController {

	protected $githubAuthProvider;
	protected $facebookAuthProvider;
	protected $userRepository;

	public function __construct( GithubAuthProvider $githubAuthProvider, FacebookAuthProvider $facebookAuthProvider,
			UserRepository $userRepository;
		) {

		$this->beforeFilter( 'guest', [ 'except' => [ 'logout' ] ] );

		$this->githubAuthProvider 	= $githubAuthProvider;
		$this->facebookAuthProvider = $facebookAuthProvider;
		$this->userRepository 		= $userRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$facebook_url 	= $this->facebookAuthProvider->getAuthUrl();
		$github_url 	= $this->githubAuthProvider->getAuthUrl();

		return View::make( 'login', compact( 'facebook_url', 'github_url' ) );
	}

	/**
	 * [login description]
	 * @return [type] [description]
	 */
	public function login() {

	}

	/**
	 * [facebookLogin description]
	 * @return [type] [description]
	 */
	public function facebookLogin() {

		$code = Input::get( 'code' );

		if( ! $code )
			exit( 'dine' );
			
		$token = $this->facebookAuthProvider->requestAccessToken( $code );

		$user = $this->facebookAuthProvider->getUser();

		if( ! $this->userRepository->getByEmail( $user[ 'email' ] ) )
			$this->userRepository->register( $user );

		Auth::attempt( $this->userRepository->getModel() );

	}

	public function githubLogin() {

		$code = Input::get( 'code' );

		if( ! $code )
			exit( 'dine' );
			
		$token = $this->githubAuthProvider->requestAccessToken( $code );

		$user = $this->githubAuthProvider->getUser();

		dd( $user );

	}


}
