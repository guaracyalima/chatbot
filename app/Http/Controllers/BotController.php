<?php

namespace App\Http\Controllers;

use Facades\Bot\Webhook;
use Illuminate\Http\Request;
//use Facades\Bot\Webhook;


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
}
