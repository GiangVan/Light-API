<?php

includeModel('AccountModule', 'AccountSession');
includeModel('DBMappingModule', 'MySQL/AccountBound');

class UnblockAccount{
    public static function resolve($args) : array{
        $result = false;
        $describe = '';

        $code_token = $args['auth']['code_token'];
        $access_token = $args['auth']['access_token'];
        $id_account = $args['id_account'];

        $account = AccountSession::getAccountByLoginSession($code_token, $access_token);
        if($account != null && $account->fetch())
        {
            $id_sender = $account->id_account;

            $account_bound = new AccountBound($id_sender, $id_account);
            if($account_bound->fetch(['id_bound_type']))
            {
                $result = $account_bound->delete();
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