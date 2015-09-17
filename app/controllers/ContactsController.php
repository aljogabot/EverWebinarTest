<?php

	use Company\Repositories\UserRepository;
	use Company\Repositories\ContactRepository;
	use Company\Handlers\ResponseHandler\JsonResponse;
		
	class ContactsController extends \BaseController {
		
		protected $layout = 'layout';

		protected $userRepository;
		protected $contactRepository;

		public function __construct( UserRepository $userRepository, ContactRepository $contactRepository ) {
			$this->userRepository 		= $userRepository;
			$this->contactRepository	= $contactRepository;		
		}

		/**
		 * Landing Page of Authentication
		 * @return [type] [description]
		 */
		public function index() {
			$contacts = $this->contactRepository->getAll();
			$this->layout->content = View::make( 'contacts/index', compact( 'contacts' ) );
		}

		

	}