<?php

	namespace Company\Repositories;
	
	class UserRepository {
	
		public function __construct( User $user ) {
			$this->model = $model;
		}

		public function getByEmail( $email ) {

			$this->model = $this->model->where( 'email', '=', $email )
			  			        ->first();

			return $this->model;

		}
	
	}