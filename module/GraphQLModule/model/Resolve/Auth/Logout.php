<?php

includeModel('DBMappingModule', 'MySQL/LoginSession');

class Logout{
    public static function resolve($args) : bool{
        $code_token = $args['auth']['code_token'];
        $access_token = $args['auth']['access_token'];

        $log = new LoginSession($code_token, $access_token);
        
        return $log->delete();
    }
}