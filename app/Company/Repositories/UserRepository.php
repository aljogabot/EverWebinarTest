<?php

	namespace Company\Repositories;

	use User;
	
	class UserRepository extends EloquentRepository {

		protected $model;
	
		public function __construct( User $model ) {
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