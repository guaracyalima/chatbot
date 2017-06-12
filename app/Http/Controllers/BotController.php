<?php

namespace App\Http\Controllers;

use Bot\CallSendAPI;
use Bot\Message\Text;
use Facades\Bot\Webhook;
use Illuminate\Http\Request;

class BotController extends Controller
{
    public function subscribe(Request $request)
    {
        $hub_challenge = Webhook::check(config('botfb.validationToken'));

        if (!$hub_challenge)
        {
            abort(403, "Ação nao autorizada");
        }
        return $hub_challenge;
    }

    public function receiveMessage(Request $request)
    {
        $event = file_get_contents("php://input");
        $event = json_decode($event, true, 512, JSON_BIGINT_AS_STRING); //transforna no formato impementado na classe
        $event = $event['entry']['0']['messaging']['0'];

        $senderId = $event['sender']['id'];
        $message = $event['message']['text'];
       // $postback = $event['postback'];


        $text = new Text($senderId);
        $text = $message->message('Ola '. $message);

        $callSendAPI =  new CallSendAPI(conig('botfb.pageAccessToken'));

        return $callSendAPI->make($message);


    }
}
