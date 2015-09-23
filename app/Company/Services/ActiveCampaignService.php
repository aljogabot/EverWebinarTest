<?php

namespace Company\Services;

use ActiveCampaign;
use Config;

class ActiveCampaignService
{
    protected $activeCampaign;

    /**
     * @param UserRepository
     */
    public function __construct()
    {
        $config = Config::get('active-campaign');
        $this->activeCampaign = new ActiveCampaign($config[ 'api_url' ], $config[ 'api_key' ]);
    }

    public function getAllContacts()
    {
        return $this->activeCampaign->api('contact/list?ids=all');
    }

    public function createContact($contact)
    {
        $contactData = [
            'email'        => $contact->email,
            'first_name'    => $contact->first_name,
            'last_name'        => $contact->last_name,
            'phone'            => $contact->phone,
            'field[2,0]'    => $contact->custom_1,
            'field[3,0]'    => $contact->custom_2,
            'field[4,0]'    => $contact->custom_3,
            'field[5,0]'    => $contact->custom_4,
            'field[6,0]'    => $contact->custom_5,
        ];

        return $this->activeCampaign->api('contact/add', $contactData);
    }

    public function viewContact($contactId)
    {
        return $this->activeCampaign->api('contact/view?id=' . $contactId);
    }

    public function updateContact($contact)
    {
        $contactData = [
            'id'            => $contact->active_campaign_subscriber_id,
            'email'        	=> $contact->email,
            'first_name'    => $contact->first_name,
            'last_name'     => $contact->last_name,
            'phone'         => $contact->phone,
            'field[2,0]'    => $contact->custom_1,
            'field[3,0]'    => $contact->custom_2,
            'field[4,0]'    => $contact->custom_3,
            'field[5,0]'    => $contact->custom_4,
            'field[6,0]'    => $contact->custom_5,
            // Just Forced it for now :)
            'p[3]'          => '3',
        ];

        return $this->activeCampaign->api('contact/edit?id=' . $contact->active_campaign_subscriber_id, $contactData);
    }

    public function deleteContact($contactId)
    {
        return $this->activeCampaign->api('contact/delete?id=' . $contactId);
    }
}
