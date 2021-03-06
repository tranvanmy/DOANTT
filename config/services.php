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
        'client_id' => '577128473078-03rjg69d0omdpbb23u6t37gcm9uap74u.apps.googleusercontent.com',
        'client_secret' => '788mWgDfbBlVd2IIM-Pho1eN',
        'redirect' => env('APP_URL') . 'callback/google',
    ],

    'facebook' => [
        'client_id' => '135912990610705',
        'client_secret' => '121a3cbef4903643382c9e5a5c9f09ce',
        'redirect' => 'http://localhost:8000/auth/callback/facebook',
    ],
    
];
