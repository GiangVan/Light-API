<?php

class AccountBoundManagement{
    
    public static function getAllFriend(string $code_token, string $access_token) : array{
        $result = DB::query("
                SELECT `account`.*
                FROM `login_session`
                INNER JOIN `account_bound` ON 
                    `account_bound`.`id_sender` = `login_session`.`id_account` AND
                    `account_bound`.`id_bound_type` = :id_bound_type
                INNER JOIN `account` ON `account_bound`.`id_receiver` = `account`.`id_account`
                WHERE 
                    `login_session`.`access_token` = :access_token AND
                    `login_session`.`code_token` = :code_token
                GROUP BY `account_bound`.`id_receiver`
            ",
            [
                'id_bound_type' => GlobalConfig::get('FRIEND_TYPE'),
                'access_token' => $access_token,
                'code_token' => $code_token
            ]
        );
        
        return $result;
    }
    public static function getAllFriendRequest(string $code_token, string $access_token) : array{
        $result = DB::query("
                SELECT `account`.*
                FROM `login_session`
                INNER JOIN `account_bound` ON 
                    `account_bound`.`id_sender` = `login_session`.`id_account` AND
                    `account_bound`.`id_bound_type` = :id_bound_type
                INNER JOIN `account` ON `account_bound`.`id_receiver` = `account`.`id_account`
                WHERE 
                    `login_session`.`access_token` = :access_token AND
                    `login_session`.`code_token` = :code_token
                GROUP BY `account_bound`.`id_receiver`
            ",
            [
                'id_bound_type' => GlobalConfig::get('FRIEND_REQUEST_TYPE'),
                'access_token' => $access_token,
                'code_token' => $code_token
            ]
        );
        
        return $result;
    }

    public static function getAllBlockedAccount(string $code_token, string $access_token) : array{
        $result = DB::query("
                SELECT `account`.* 
                FROM `login_session`
                INNER JOIN `account_bound` ON 
                    `account_bound`.`id_sender` = `login_session`.`id_account` AND
                    `account_bound`.`id_bound_type` = :id_bound_type
                INNER JOIN `account` ON `account_bound`.`id_receiver` = `account`.`id_account`
                WHERE 
                    `login_session`.`access_token` = :access_token AND
                    `login_session`.`code_token` = :code_token
                GROUP BY `account_bound`.`id_receiver`
            ",
            [
                'id_bound_type' => GlobalConfig::get('BLOCKED_TYPE'),
                'access_token' => $access_token,
                'code_token' => $code_token
            ]
        );
        
        return $result;
    }

    public static function getRelationship(string $code_token, string $access_token, int $account_id) : array{
        $result = DB::query("
                SELECT `account_bound`.`id_account_bound`, `account_bound`.`id_bound_type`, `account_bound`.`updated_at`,
                FROM `login_session`
                INNER JOIN `account_bound` ON 
                    `account_bound`.`id_sender` = `login_session`.`id_account` AND
                    `account_bound`.`id_bound_type` = :id_bound_type
                INNER JOIN `account` ON `account_bound`.`id_receiver` = `account`.`id_account`
                WHERE 
                    `login_session`.`access_token` = :access_token AND
                    `login_session`.`code_token` = :code_token
                GROUP BY `account_bound`.`id_receiver`
            ",
            [
                'id_bound_type' => GlobalConfig::get('BLOCKED_TYPE'),
                'access_token' => $access_token,
                'code_token' => $code_token
            ]
        );
        
        return $result;
    }
}