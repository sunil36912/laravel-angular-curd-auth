<?php

namespace App\Packages\SMSDriver;

use TTzsk\Sms\Abstracts\Driver;

class MyDriver extends Driver
{
    # You will have to make 2 methods.
    /**
     * 1. __constructor($settings) # {Mandatory} This settings is your Config Params that you've set.
     * 2. send() # (Mandatory) This is the main message that will be sent.
     *
     * Example Given below:
     */

    /**
     * @var object
     */
    protected $settings;

    /**
     * @var mixed
     */
    protected $client;

    /**
     * Your Driver Config.
     *
     * @var array $settings
     */
    public function __construct($settings)
    {
        dd('here in setting');
        $this->settings = (object) $settings;
        # Initialize any Client that you want.
        $this->client = new Client(); # Guzzle Client for example.
    }

    /**
     * @return object Ex.: (object) ['status' => true, 'data' => 'Client Response Data'];
     */
    public function send()
    {
        dd('here in send');
        $this->recipients; # Array of Recipients.
        $this->body; # SMS Body.


    }
}
