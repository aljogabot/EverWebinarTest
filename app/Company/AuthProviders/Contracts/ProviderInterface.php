<?php

	namespace Company\AuthProviders\Contracts;
	
	interface ProviderInterface  {
	
		public function getAuthUrl();

		public function requestAccessToken( $code );

		public function getUser();

		public function authenticate();
	
	}