<?php
/**
 * Created by PhpStorm.
 * User: Phanton II
 * Date: 11/06/2017
 * Time: 14:36
 */

namespace Bot\Message;


interface MessageInterface
{
    public function __construct($recipientId);
    public function message(string $messageText) :array;
}