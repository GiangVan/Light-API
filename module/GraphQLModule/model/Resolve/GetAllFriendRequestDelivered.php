<?php

includeModel('DBMappingModule', 'MySQL/AccountBound');

class GetAllFriendRequestDelivered{
    public static function resolve($args) : array{
        if(isset($args['auth']))
        {
            $access_token = $args['auth']['access_token'];
            $code_token = $args['auth']['code_token'];
            
            return DB::query("
                    SELECT `account_bound`.`id_receiver` AS `id_account`, `account_bound`.`updated_at` AS `date`, `id_account_bound` AS `id_request`
                    FROM `account_bound`
                    INNER JOIN `login_session` ON `id_sender` = `id_account`
                    WHERE `access_token` = :access_token AND `code_token` = :code_token AND `id_bound_type` = :bound
                ",
                [
                    ':bound' => GlobalConfig::get('FRIEND_REQUEST_TYPE'),
                    ':access_token' => $access_token,
                    ':code_token' => $code_token
                ]
            );
        }
        else
        {
            return [];
        }
    }
}