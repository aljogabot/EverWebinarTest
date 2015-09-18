<?php

	use Company\Repositories\UserRepository;
	use Company\Repositories\ContactRepository;
	use Company\Handlers\ResponseHandler\JsonResponse;
		
	class ContactsController extends \BaseController {
		
		protected $layout = 'layout';

		protected $userRepository;
		protected $contactRepository;

		public function __construct( UserRepository $userRepository, ContactRepository $contactRepository, JsonResponse $json ) {
			$this->userRepository 		= $userRepository;
			$this->contactRepository	= $contactRepository;
			$this->json 				= $json;

			if( Request::ajax() )
				$this->beforeFilter( 'csrf' );

			$this->userRepository->setModel( Auth::user() );
		}

		/**
		 * Landing Page of Authentication
		 * @return [type] [description]
		 */
		public function index() {

			$contacts = $this->userRepository->getAllContacts();

			if( Request::ajax() ) {
				$this->json->set( 'contacts', $contacts );
				return $this->json->success();
			}

			$this->setPageTitle( 'Contacts Page' );

			$this->layout->content = View::make( 'contacts.index', compact( 'contacts' ) );
		}

		/**
		 * Load the Contact Form 
		 * @return Json Response
		 */
		public function edit( $contactId ) {

			$contact = $this->contactRepository->getById( $contactId );

			if( ! $contact ) {
				$contact = new Contact;
				$contact->id = 0;
			}

			$content = View::make( 'contacts.modals.edit', compact( 'contact' ) )
							->render();

			$this->json->set( 'content', $content );
			return $this->json->success();

		}

		/**
		 * [save description]
		 * @return [type] [description]
		 */
		public function store( $contactId ) {
			dd( $contactId );
		}

		/**
		 * [destroy description]
		 * @return [type] [description]
		 */
		public function destroy( $contactId ) {
			dd( $contactId );
		}

	}