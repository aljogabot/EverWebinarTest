<?php

	namespace Company\AuthProviders;

	use Company\AuthProviders\Contracts\ProviderInterface;
	use Auth;
	
	class Facebook extends Provider implements ProviderInterface {
	
		protected $provider;

		protected $providerName = 'Facebook';
		protected $landingRoute = 'facebook-login';

		/**
		 * You can refactor this more to suit your needs,
		 * for now, this will do :)
		 * @return array
		 */
		public function getUser() {
			return json_decode( $this->provider->request( '/me?fields=id,name,email,picture,link' ), TRUE );
		}

		
		public function authenticate() {

			$user = $this->getUser();

			$user = User::where( 'email', '=', $user[ 'email' ] );


			if( ! $user ) {

			}

			return Auth::attempt( $user );

		}
	
	}