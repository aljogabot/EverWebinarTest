<?php

	namespace Company\Services;
	
	class ActiveCampaignService {
		
		protected $userRepository;

		/**
		 * @param UserRepository
		 */
		public function __construct( UserRepository $userRepository ) {
			$this->userRepository = $userRepository;
		}
	
	}