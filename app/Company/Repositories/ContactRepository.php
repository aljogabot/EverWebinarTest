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

		public function instantiate( $contactId, $fields ) {

			$contact = Contact::find( $contactId );

			if( ! $contact ) {
				return $contact = new Contact( $fields );
			}

			return $contact->fill( $fields );

		}

		public function getAllBySearch( $text ) {

			return $this->model->orWhere( 'name', $text )
							->orWhere( 'phone', $text )
							->orWhere( 'email', $text )
							->get();

		}
	
	}