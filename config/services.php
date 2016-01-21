<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

   'github' => [
        'client_id' =>  'GITHUB_CLIENT_ID',
        'client_secret' => 'GITHUB_CLIENT_SECRET',
        'redirect' => 'GITHUB_REDIRECT',
    ],

    'facebook' => [
        'client_id' =>  '754864991313285',
        'client_secret' => '8f8c8d15871e2035bf76584e129c0db8',
        'redirect' => 'http://elastic-heart.dev/social/login/facebook',
    ],


     'google' => [
        'client_id' =>  '1024750123636-4m9cf0ra6js17fkci5gkpbr9ajeq1k91.apps.googleusercontent.com',
        'client_secret' => env('tC15-Yejy2YOakrxJvkFaoQT'),
        'redirect' => 'http://elastic-heart.dev/social/login/google',
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
