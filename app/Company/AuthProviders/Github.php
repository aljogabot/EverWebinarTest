<?php

	namespace Company\AuthProviders;

	use Company\AuthProviders\Contracts\ProviderInterface;
	use Auth;
	
	class Github extends Provider implements ProviderInterface {
	
		protected $provider;

		protected $providerName = 'Github';
		protected $landingRoute = 'github-login';

		public function getUser() {
			$user = json_decode( $this->provider->request( 'user' ), TRUE );

			return [
				'github_id' 	=> $user[ 'id' ],
				'email'			=> $user[ 'email' ],
				'name'  		=> $user[ 'name' ],
			];
		}
	
	}