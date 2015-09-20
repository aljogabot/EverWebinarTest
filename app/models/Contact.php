<?php

use Company\Services\ActiveCampaignService;

class Contact extends Eloquent
{
    /**
     * I placed it in here to be formal :)
     *
     * @var string
     */
    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'custom_1',
        'custom_2',
        'custom_3',
        'custom_4',
        'custom_5'
    ];

    public static function boot()
    {
        parent::boot();

        static::created(
            function ($model) {
                $activeCampaignService = new ActiveCampaignService;
                $response = $activeCampaignService->createContact($model);

                if (! $response->success) {
                    $model->delete();
                    return false;
                }

                $model->active_campaign_subscriber_id = $response->subscriber_id;
                $model->save();
            }
        );

        static::updated(
            function ($model) {
                $activeCampaignService = new ActiveCampaignService;
                $response = $activeCampaignService->updateContact($model);
            }
        );

        static::deleted(
            function ($model) {
                if ($model->active_campaign_subscriber_id) {
                    $activeCampaignService = new ActiveCampaignService;
                    $activeCampaignService->deleteContact($model->active_campaign_subscriber_id);
                }
            }
        );
    }

    /**
     * @return Eloquent/Relations
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function last_name()
    {
        $last_name = explode(' ', $this->name);
        return array_pop($last_name);
    }

    public function first_name()
    {
        $last_name = $this->last_name();
        return trim(str_replace($last_name, '', $this->name));
    }
}
