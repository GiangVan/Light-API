<?php

includeModel('AccountModule', 'AccountSession');

class GetAccount{
    public static function resolve($args) : array{
        $result = [];

        $code_token = $args['auth']['code_token'];
        $access_token = $args['auth']['access_token'];

        $account = AccountSession::getAccountByLoginSession($code_token, $access_token);
        if($account != null && $account->fetch())
        {
            $result = $account->toArray();
        }

        return $result;
    }
}

