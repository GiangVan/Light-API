<?php

includeModel('AccountModule', 'AccountBoundManagement');

class GetAllBlockedAccount{
    public static function resolve($args) : array{
        $access_token = $args['auth']['access_token'];
        $code_token = $args['auth']['code_token'];
        
        return AccountBoundManagement::getAllBlockedAccount($code_token, $access_token);
    }
}