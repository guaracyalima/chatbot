<?php

/**
 * Created by PhpStorm.
 * User: Phanton II
 * Date: 11/06/2017
 * Time: 14:12
 */
namespace Bot\Message;
class Text implements MessageInterface
{

    private $recipientId;

    public function __construct($recipientId)
    {
        $this->recipientId = $recipientId;
    }

    public function message(string $messageText) :array
    {
        return [
            'recipient' => [
                'id' => $this->recipientId
            ],
            'message' => [
                'text' => $messageText,
                'metadata' => 'DEVELOPER_DEFINED_METADATA'
            ]
        ];
    }
}
