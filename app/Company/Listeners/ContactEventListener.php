<?php

	namespace Company\Listeners;

	use Company\Services\ActiveCampaignService;
	
	class ContactEventListener {
	
		public function createToActiveCampaign( $contact )
		{
			$activeCampaignService = new ActiveCampaignService;
            $response = $activeCampaignService->createContact($contact);

            if (! $response->success) {
                //$contact->delete();
                //return FALSE;
                return TRUE;
            }

            $contact->active_campaign_subscriber_id = $response->subscriber_id;
            $contact->save();
		}

		public function updateToActiveCampaign( $contact ) 
		{
			$activeCampaignService = new ActiveCampaignService;
            $response = $activeCampaignService->updateContact($contact);
		}

		public function deleteToActiveCampaign( $contact )
		{
			if ($contact->active_campaign_subscriber_id) {
                $activeCampaignService = new ActiveCampaignService;
                $activeCampaignService->deleteContact($contact->active_campaign_subscriber_id);
            }
		}
	
	}