<?php

use Company\AuthProviders\Github as GithubAuthProvider;
use Company\AuthProviders\Facebook as FacebookAuthProvider;
use Company\Repositories\UserRepository;
use Company\Handlers\ResponseHandler\JsonResponse;

class AuthController extends \BaseController {

	protected $layout = 'authentication';

	protected $githubAuthProvider;
	protected $facebookAuthProvider;
	protected $userRepository;

	/**
	 * @param GithubAuthProvider
	 * @param FacebookAuthProvider
	 * @param UserRepository
	 */
	public function __construct( GithubAuthProvider $githubAuthProvider, FacebookAuthProvider $facebookAuthProvider,
			UserRepository $userRepository, JsonResponse $json
		) {

		$this->beforeFilter( 'guest', [ 'except' => [ 'logout' ] ] );

		$this->githubAuthProvider 	= $githubAuthProvider;
		$this->facebookAuthProvider = $facebookAuthProvider;
		$this->userRepository 		= $userRepository;
		$this->json 				= $json;
	}

	/**
	 * 
	 * @return Response
	 */
	public function index()
	{
		
		$this->setPageTitle( 'Login Page' );

		$this->layout->facebook_url = $this->facebookAuthProvider->getAuthUrl();
		$this->layout->github_url	= $this->githubAuthProvider->getAuthUrl();

	}

	/**
	 * [login description]
	 * @return Json Response
	 */
	public function login() {

		$validator = Validator::make(
			Input::only( 'email', 'password' ),
			[
				'email' 	=> 'required|email',
				'password'	=> 'required|min:6'
			]
		);

		if( $validator->fails() ) {
			$message = join( "<br />", $validator->messages()->all() );
			return $this->json->error( $message );
		}

		if( ! Auth::attempt( Input::only( 'email', 'password' ) ) ) {
			return $this->json->error( 'Invalid Email or Password' );
		}

		// 
		return $this->json->success( 'Login Successfull ...' );	
	}

	/**
	 * Process Registration
	 * @return Json Response
	 */
	public function register() {

		$validator = Validator::make(
			Input::only( 'name', 'email', 'password' ),
			[
				'name'		=> 'required',
				'email' 	=> 'required|email',
				'password'	=> 'required|min:6'
			]
		);

		if( $validator->fails() ) {
			$message = join( "<br />", $validator->messages()->all() );
			return $this->json->error( $message );
		}

		if( ! Auth::attempt( Input::only( 'email', 'password' ) ) ) {
			return $this->json->error( 'Invalid Email or Password' );
		}

		// 
		return $this->json->success( 'Login Successfull ...' );
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

		dd( $user );

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

	/**
	 * Logs Out The Current User ...
	 * @return Response
	 */
	public function logout() {

	}


}
