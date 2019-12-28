<?php

includeModel('AccountModule', 'AccountSession');
includeModel('DBMappingModule', 'MySQL/AccountBound');

class SendFriendRequest{
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

            //check friend request
            $account_bound = new AccountBound($id_receiver, $id_sender);
            if($account_bound->fetch(['id_bound_type']))
            {
                switch ($account_bound->id_bound_type) {
                    case GlobalConfig::get('FRIEND_REQUEST_TYPE'):
                        //make friend
                        $account_bound->id_bound_type = GlobalConfig::get('FRIEND_TYPE');
                        $account_bound->updated_at = date(GlobalConfig::get('MYSQL_DATE_FORMAT'));
                        $result = $account_bound->update();
                        //delete friend request
                        if($result)
                        {
                            $account_bound = new AccountBound($id_sender, $id_receiver);
                            if($account_bound->fetch(['id_account_bound']))
                            {
                                $account_bound->delete();
                            }
                        }
                        
                        break;
                    case GlobalConfig::get('BLOCKED_TYPE'):
                        $describe = 'That person has blocked you';
                        break;
                    case GlobalConfig::get('FRIEND_TYPE'):
                        $describe = "You have made friends with that person";
                        break;
                    default:
                        $describe = "unknow (id_bound_type = $account_bound->id_bound_type)";
                        break;
                }
            }
            else
            {
                //send friend request
                $account_bound = new AccountBound($id_sender, $id_receiver);
                if($account_bound->fetch(['id_bound_type']))
                {
                    switch ($account_bound->id_bound_type) {
                        case GlobalConfig::get('FRIEND_REQUEST_TYPE'):
                            $result = true;
                            break;
                        case GlobalConfig::get('FRIEND_TYPE'):
                            $describe = "You have made friends with that person";
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
                    $account_bound->id_bound_type = GlobalConfig::get('FRIEND_REQUEST_TYPE');
                    $result = $account_bound->insert();
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