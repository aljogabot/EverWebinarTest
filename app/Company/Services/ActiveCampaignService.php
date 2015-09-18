<?php

	namespace Company\Services;

	use ActiveCampaign;
	use Config;

	class ActiveCampaignService {
		
		protected $activeCampaign;

		/**
		 * @param UserRepository
		 */
		public function __construct() {
			$config = Config::get( 'active-campaign' );
			$this->activeCampaign = new ActiveCampaign( $config[ 'api_url' ], $config[ 'api_key' ] );
		}

		public function getAllContacts() {
			return $this->activeCampaign->api( 'contact/list?ids=all' );
		}

		public function createContact( $contact ) {
			$contactData = [
				'email' 		=> $contact->email,
				'first_name'	=> $contact->first_name(),
				'last_name'		=> $contact->last_name(),
				'phone'			=> $contact->phone
			];

			return $this->activeCampaign->api( 'contact/add', $contactData );
		}

		public function viewContact( $contactId ) {
			return $this->activeCampaign->api( 'contact/view?id=' . $contactId );
		}

		public function updateContact( $contact ) {
			$contactData = [
				'email' 		=> $contact->email,
				'first_name'	=> $contact->first_name(),
				'last_name'		=> $contact->last_name(),
				'phone'			=> $contact->phone
			];

			return $this->activeCampaign->api( 'contact/sync?id=' . $contact->active_campaign_subscriber_id, $contactData );
		}

		public function deleteContact( $contactId ) {
			return $this->activeCampaign->api( 'contact/delete?id=' . $contactId );
		}
	
	}