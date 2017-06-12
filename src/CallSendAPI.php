<?php
/**
 * Created by PhpStorm.
 * User: Phanton II
 * Date: 11/06/2017
 * Time: 14:56
 */

namespace Bot;


use GuzzleHttp\Client;

class CallSendAPI
{

    const URL = '$https:graph.facebook.com/v2.6/me/messages';
    private $pageAccessToken;

    public function __construct($pageAccessToken)
    {

        $this->pageAccessToken = $pageAccessToken;
    }

    public function make(array $message)
    {
        $client = new Client();
        $response = $client->request('POST', CallSendAPI::URL. [
            'json' => $message,
                'queri' => ['access_token' => $this->pageAccessToken]
            ]);

        return (string) $response->getBody();
    }

}