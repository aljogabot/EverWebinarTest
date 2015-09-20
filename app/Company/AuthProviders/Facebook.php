<?php

namespace Company\AuthProviders;

use Company\AuthProviders\Contracts\ProviderInterface;
use Auth;

class Facebook extends Provider implements ProviderInterface
{
    protected $provider;

    protected $providerName = 'Facebook';
    protected $landingRoute = 'facebook-login';

    /**
     * You can refactor this more to suit your needs,
     * for now, this will do :)
     * @return array
     */
    public function getUser()
    {
        $user = json_decode($this->provider->request('/me?fields=id,name,email,picture,link'), true);

        return [
            'facebook_id' => $user[ 'id' ],
            'email'       => $user[ 'email' ],
            'name'        => $user[ 'name' ],
        ];
    }
}
