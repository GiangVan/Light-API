<?php

includeModel('DBMappingModule', 'MySQL/LoginSession');
includeModel('DBMappingModule', 'MySQL/Account');
includeModel('AccountModule', 'AccountSession');

class Login{
    public static function resolve($args) : ?LoginSession{
        $password = $args['password'];
        $user_name = $args['user_name'];
        $describe = $args['describe'] ?? '';

        $account = new Account($user_name);
        if($account->fetch(['password']) && password_verify($password, $account->password))
        {
            return AccountSession::addNewLoginSession($user_name, $describe);
        }
        
        return null;
    }
}