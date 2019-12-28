<?php

includeModel('AccountModule', 'AccountBoundManagement');

class GetAllFriend{
    public static function resolve($args) : array{
        if(isset($args['auth']))
        {
            $access_token = $args['auth']['access_token'];
            $code_token = $args['auth']['code_token'];
            
            return AccountBoundManagement::getAllFriend($code_token, $access_token);
        }
        else
        {
            return [];
        }
    }
}