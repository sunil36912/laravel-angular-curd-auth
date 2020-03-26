<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Driver
    |--------------------------------------------------------------------------
    |
    | This value determines which of the following gateway to use.
    | You can switch to a different driver at runtime.
    |
    */
    'default' => 'textlocal',

    /*
    |--------------------------------------------------------------------------
    | List of Drivers
    |--------------------------------------------------------------------------
    |
    | These are the list of drivers to use for this package.
    | You can change the name. Then you'll have to change
    | it in the map array too.
    |
    */
    'drivers' => [
        'sns' => [ // Install: composer require aws/aws-sdk-php
            'key' => 'Your AWS SNS Access Key',
            'secret' => 'Your AWS SNS Secret Key',
            'region' => 'Your AWS SNS Region',
            'sender' => 'Your AWS SNS Sender ID',
            'type' => 'Tansactional', // Or: 'Promotional'
        ],
        'textlocal' => [
            'url' => 'http://api.textlocal.in/send/', // Country Wise this may change.
            'username' => 'FuhOsktmIJM-M116yAjwQCwtz82QEqenAPrQSmwqYA',
            'hash' => 'cf1746882667f4792a1693a06e1942bcca5d31ce5fc22939a492ac37f2d14ad8',
            'sender' => 'sunil',
        ],
        'nexmo' => [ // Install: composer require nexmo/client
            'key' => 'Your Nexmo API Key',
            'secret' => 'Your Nexmo API Secret',
            'from' => 'Your Nexmo From Number',
        ],
        'twilio' => [ // Install: composer require twilio/sdk
            'sid' => 'Your SID',
            'token' => 'Your Token',
            'from' => 'Your Default From Number',
        ],
        'clockwork' => [ // Install: composer require mediaburst/clockworksms
            'key' => 'Your clockwork API Key',
        ],
        'linkmobility' => [
            'url' => 'http://simple.pswin.com', // Country Wise this may change.
            'username' => 'Your Username',
            'password' => 'Your Password',
            'sender' => 'Sender name',
        ],
        'melipayamak' => [ // Install: composer require melipayamak/php
            'username' => 'Your Username',
            'password' => 'Your Password',
            'from' => 'Your Default From Number',
            'flash' => false,
        ],
        'kavenegar' => [ // Install: composer require kavenegar/php
            'apiKey' => 'Your Api Key',
            'from' => 'Your Default From Number',
        ],
        'smsir' => [
            'url' => 'https://ws.sms.ir/',
            'apiKey' => 'Your Api Key',
            'secretKey' => 'Your Secret Key',
            'from' => 'Your Default From Number',
        ],
        'tsms' => [
            'url' => 'http://www.tsms.ir/soapWSDL/?wsdl',
            'username' => 'Your Username',
            'password' => 'Your Password',
            'from' => 'Your Default From Number',
        ],
        'farazsms' => [
            'url' => '37.130.202.188/services.jspd',
            'username' => 'Your Username',
            'password' => 'Your Password',
            'from' => 'Your Default From Number',
        ],
        'smsgatewayme' => [
            'apiToken' => 'Your Api Token',
            'from' => 'Your Default Device ID',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Maps
    |--------------------------------------------------------------------------
    |
    | This is the array of Classes that maps to Drivers above.
    | You can create your own driver if you like and add the
    | config in the drivers array and the class to use for
    | here with the same name. You will have to extend
    | Tzsk\Sms\Abstracts\Driver in your driver.
    |
    */
    'map' => [

        'textlocal' => \Tzsk\Sms\Drivers\Textlocal::class,


    ]
];
