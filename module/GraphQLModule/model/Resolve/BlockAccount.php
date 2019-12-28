<?php

includeModel('AccountModule', 'AccountSession');
includeModel('DBMappingModule', 'MySQL/AccountBound');

class BlockAccount{
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
                $account_bound->id_bound_type = GlobalConfig::get('BLOCKED_TYPE');
                $account_bound->updated_at = date(GlobalConfig::get('MYSQL_DATE_FORMAT'));
                $result = $account_bound->update();
            }
            else
            {
                $account_bound->id_bound_type = GlobalConfig::get('BLOCKED_TYPE');
                $result = $account_bound->insert();
            }
            //delete bound between them
            if($result)
            {
                $account_bound = new AccountBound($id_account, $id_sender);
                if($account_bound->fetch(['id_bound_type']))
                {
                    $result = $account_bound->delete();
                }
            }
            else
            {
                $describe = 'faild to update or insert account bound';
            }
        }
        else
        {
            $describe = 'account not found';
        }

        return compact('result', 'describe');
    }
}