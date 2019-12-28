<?php

includeModel('AccountModule', 'AccountSession');
includeModel('DBMappingModule', 'MySQL/AccountBound');

class UnFriend{
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

            $account_bound = new AccountBound($id_account, $id_sender);
            $that_person_bound_type = $account_bound->fetch(['id_bound_type']) ? $account_bound->id_bound_type : null;

            if($that_person_bound_type === GlobalConfig::get('FRIEND_TYPE'))
            {
                $result = $account_bound->delete();
            }
            else
            {
                $account_bound = new AccountBound($id_sender, $id_account);
                if($account_bound->fetch(['id_bound_type']))
                {
                    switch ($account_bound->id_bound_type) {
                        case GlobalConfig::get('FRIEND_REQUEST_TYPE'):
                            $result = $account_bound->delete();
                            break;
                        case GlobalConfig::get('FRIEND_TYPE'):
                            $result = $account_bound->delete();
                            break;
                        case GlobalConfig::get('BLOCKED_TYPE'):
                            $describe = "You have blocked that person";
                            break;
                        default:
                            $describe = "unknow (id_bound_type = $account_bound->id_bound_type)";
                            break;
                    }
                }
                else
                {
                    $describe = "You and that person are not a friend";
                }
            }
        }
        else
        {
            $describe = 'account not found';
        }

        return compact('result', 'describe');
    }
}