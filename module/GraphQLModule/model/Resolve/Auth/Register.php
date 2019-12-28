<?php

includeModel('DBMappingModule', 'MySQL/LoginSession');
includeModel('DBMappingModule', 'MySQL/Account');
includeModel('AccountModule', 'AccountSession');
includeModel('GraphQLModule', 'Resolve/Upload/AccountAvatarUpload');

class Register{
    public static function resolve($args, RoutingData $data) : ?LoginSession{
        $password = $args['password'];
        $user_name = $args['user_name'];
        $name = $args['name'];
        $describe = $args['describe'] ?? '';

        //check exist user_name
        $account = new Account($user_name);
        if(!$account->fetch(['id_account']))
        {
            $account = new Account($user_name);
            $account->describe = $describe;
            $account->name = $name;
            $account->dir_path = generateRandomString(128);
            $account->password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>12]);
            if($account->insert())
            {
                $login_session = AccountSession::addNewLoginSession($user_name, 'for test');
                
                //add account picture
                if($login_session != null)
                {
                    $account->fetch(['id_account']);
                    $args['id_account'] = $account->id_account;
                    $args['auth']['code_token'] = $login_session->code_token;
                    $args['auth']['access_token'] = $login_session->access_token;
                    AccountAvatarUpload::resolve($args, $data);
                }

                return $login_session;
            }
        }

        return null;
    }
}