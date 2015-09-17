<?php

	namespace Company\AuthProviders;

	use URL, OAuth;
	
	Abstract class Provider {
	
		protected $providerName;
		protected $landingRoute;

		/**
		 * Initialize the provider
		 */
		public function __construct() {
			$this->provider = OAuth::consumer( $this->providerName, URL::route( $this->landingRoute ) );
		}

		/**
		 * [getAuthUrl description]
		 * @return [type] [description]
		 */
		public function getAuthUrl() {
			return $this->provider->getAuthorizationUri();
		}

		/**
		 * 
		 * @param  String $code Code that came back from the Provider
		 * @return String $token
		 */
		public function requestAccessToken( $code ) {
			return $this->provider->requestAccessToken( $code );
		}
	
	}