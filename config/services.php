<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google' => [
      'client_id' => '190057817794-ejg9jbfget68v9ig0ra1uoiitbul7vcc.apps.googleusercontent.com',
      'client_secret' => 'r2ekOFqCTzl-KqQRiFA6T1B2',
      'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

    'facebook' => [
      'client_id' => '104968323438603',
      'client_secret' => 'c397bcfe2e6e7592a6f16b471c4ad7c0',
      'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'kakao' => [
      'client_id' => '5b865c382cd67f4efbf96a782403bedc',
      'client_secret' => '2qCiPaIMtVug1VIh0oxilaSxyfonaBdZ',
      'redirect' => 'http://localhost:8000/auth/kakao/callback',
    ],
];
