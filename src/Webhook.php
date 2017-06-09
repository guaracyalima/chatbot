<?php
/**
 * Created by PhpStorm.
 * User: Phanton II
 * Date: 09/06/2017
 * Time: 01:13
 */

namespace Bot;


class Webhook
{

    public function check($token)
    {
        //faz a verificação do token

        $hubMode = filter_input(INPUT_GET, 'hub_mode');

        $hubVerifyToken = filter_input(INPUT_GET, 'hub_verify_token');

        if ($hubMode === 'subscribe' and $hubVerifyToken === $token)
        {
            return filter_input(INPUT_GET, 'hub_challenge');
        }
        return false;

    }

}