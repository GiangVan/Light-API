<?php

includeModel('AccountModule', 'AccountSession');

class AcceptFriendRequest{
    public static function resolve($args) : array{
        $result = false;
        $describe = '';

        $code_token = $args['auth']['code_token'];
        $access_token = $args['auth']['access_token'];
        $id_quest = $args['id_quest'];

        $account = AccountSession::getAccountByLoginSession($code_token, $access_token);
        if($account != null && $account->fetch())
        {
            $account_bound = new TableMappingModel('account_bound', ['id_account_bound' => $id_quest]);
            if($account_bound->fetch(['id_bound_type']))
            {
                if($account_bound->id_bound_type === GlobalConfig::get('FRIEND_REQUEST_TYPE'))
                {
                    $account_bound->id_bound_type = GlobalConfig::get('FRIEND_TYPE');
                    $account_bound->updated_at = date(GlobalConfig::get('MYSQL_DATE_FORMAT'));
                    $result = $account_bound->update();
                }
                else
                {
                    $describe = 'friend request not found';
                }
            }
            else
            {
                $describe = 'friend request not found';
            }
        }
        else
        {
            $describe = 'account not found';
        }

        return compact('result', 'describe');
    }
}