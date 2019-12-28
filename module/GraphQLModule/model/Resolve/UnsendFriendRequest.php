<?php

includeModel('AccountModule', 'AccountSession');
includeModel('DBMappingModule', 'MySQL/AccountBound');

class UnsendFriendRequest{
    public static function resolve($args) : array{
        $result = false;
        $describe = '';

        $code_token = $args['auth']['code_token'];
        $access_token = $args['auth']['access_token'];
        $id_receiver = $args['id_receiver'];

        $account = AccountSession::getAccountByLoginSession($code_token, $access_token);
        if($account != null && $account->fetch())
        {
            $id_sender = $account->id_account;

            $account_bound = new AccountBound($id_sender, $id_receiver);
            if($account_bound->fetch(['id_bound_type']))
            {
                if($account_bound->id_bound_type === GlobalConfig::get('FRIEND_REQUEST_TYPE'))
                {
                    return $account_bound->delete();   
                }
                else
                {
                    $describe = "You have no request";
                }
            }
            else
            {
                $result = true;
            }
        }
        else
        {
            $describe = 'account not found';
        }

        return compact('result', 'describe');
    }
}