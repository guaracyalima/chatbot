<?php
/**
 * Created by PhpStorm.
 * User: Phanton II
 * Date: 11/06/2017
 * Time: 14:49
 */

namespace Bot\Message;


class Audio implements MessageInterface
{

    private $recipientId;

    public function __construct($recipientId)
    {

        $this->recipientId = $recipientId;
    }

    public function message($messageText)
    {
        return [
            'recipient' =>[
                'id' => $this->recipientId
            ],
            'message' =>[
              'attachment' => [
                  'type' => 'audio',
                  'payload' => [
                      'url' => $messageText
                  ]
              ]
            ]
        ];
    }
}