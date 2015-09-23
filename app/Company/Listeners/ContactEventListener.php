<?php

	namespace Company\Listeners;

	use Company\Services\ActiveCampaignService;
	
	class ContactEventListener {

		protected $activeCampaignService;

		public function __construct( ActiveCampaignService $activeCampaignService )
		{
			$this->activeCampaignService = $activeCampaignService;
		}
	
		public function createToActiveCampaign( $contact )
		{
			$response = $this->activeCampaignService->createContact($contact);

            if (! $response->success) {
            	$contact->delete();
                return FALSE;
            }

            $contact->active_campaign_subscriber_id = $response->subscriber_id;
            $contact->save();
		}

		public function updateToActiveCampaign( $contact ) 
		{
			$response = $this->activeCampaignService->updateContact($contact);
		}

		public function deleteToActiveCampaign( $contact )
		{
			if ($contact->active_campaign_subscriber_id) {
                $this->activeCampaignService->deleteContact($contact->active_campaign_subscriber_id);
            }
		}
	
	}