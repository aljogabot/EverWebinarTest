<?php

/**
 * This Is Where Events Are Registered ...
 */

Event::listen( 'contact.created', 'Company\Listeners\ContactEventListener@createToActiveCampaign' );
Event::listen( 'contact.updated', 'Company\Listeners\ContactEventListener@updateToActiveCampaign' );
Event::listen( 'contact.deleted', 'Company\Listeners\ContactEventListener@deleteToActiveCampaign' );