<?php

return [
    'otpExpirationTimeInMinutes' => '10',
    'pagination' => [
        'limit' => '10'
    ],
    'webApp' => env('webApp', ""),
    'uploadDir' => [
        'upcomingNft' => 'upcoming-nft',
        'adsBanner' => 'ads-banner',
        'upcomingToken' => 'upcoming-token'
    ],
    'oneSignalDataTag' => [
        'subscribed_users' => [
            'key' => 'subscribed_users',
            'relation' => '=',
            'value' => 'subscribed_users'
        ]
    ]
];
