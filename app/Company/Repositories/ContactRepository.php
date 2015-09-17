<?php

	namespace Company\Repositories;

	use Contact;
	
	class ContactRepository extends EloquentRepository {
		
		protected $model;
	
		public function __construct( Contact $model ) {
			$this->model = $model;
		}

		public function getByEmail( $email ) {

			$userObject = $this->model->where( 'email', '=', $email )
			  			 		->first();

			if( $userObject ) {
				$this->model = $userObject;
			}

			return $userObject;

		}
	
	}