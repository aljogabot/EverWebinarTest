<?php

return [

	/*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => 'Session',

    /**
     * Consumers
     */
    'consumers' => array(

        /**
         * Facebook
         */
        'Facebook' => array(
            'client_id'     => '416700501866129',
            'client_secret' => '297700851b55a8327aab404eb51d8ae5',
            'scope'         => array( 'email', 'public_profile' ),
        ),

        'Github' => [
        	'client_id'		=> 'b954da90ac07f4e3aa07',
        	'client_secret' => '350898af3c2c8b470d365878a8cafa97a4dd489f'
        ],

        'Google' => array(
		    'client_id'     => '394335639370-bmtukg644tugg4s2tr1cuuhaaauvd2fd.apps.googleusercontent.com',
		    'client_secret' => 'LjZNHJDjwV6jbsykE-eHrmZF',
		    'scope'         => array( 'userinfo_email', 'userinfo_profile' )
		), 

		'Bitbucket' => array(
		    'client_id'     => '8XkjP3GU7MNhYsexEW',
		    'client_secret' => 'LJYvRAv9Ttx9PTC6y6WDryhfL9WLMwdf',
		    // No scope - oauth1 doesn't need scope
		),  

    )

];