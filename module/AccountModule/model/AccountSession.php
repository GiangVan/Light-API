<?php

includeModel('DBMappingModule', 'MySQL/Account');
includeModel('DBMappingModule', 'MySQL/LoginSession');

class AccountSession{
    
    public static function getAccountByLoginSession(string $code_token, string $access_token) : ?Account{
        $result = DB::query('
                SELECT `account`.`account_name`
                FROM `account`, `login_session`
                WHERE `account`.`id_account` = `login_session`.`id_account` 
                    AND `login_session`.`code_token` = :code_token 
                    AND `login_session`.`access_token` = :access_token
                LIMIT 1
            ',
            [
                ':code_token' => $code_token,
                ':access_token' => $access_token,
            ]
        );
        if(empty($result))
        {
            return null;
        }
        else
        {
            $account = new Account($result[0]['account_name']);
            return $account;
        }
    }

    public static function addNewLoginSession(string $user_name, string $describe) : ?LoginSession{
        $account = new Account($user_name);
        $account->fetch(['id_account']);
        
        if($account->id_account === null)
        {
            return null;
        }
        else
        {
            $randomString = generateRandomString(128);
            $code_token = generateRandomString(16);
            $login_session_id = DB::query('
                SELECT `id_login_session` 
                FROM `login_session` 
                ORDER BY `id_login_session` desc 
                LIMIT 1'
            );
            $login_session_id = empty($login_session_id) ? 0 : $login_session_id[0]['id_login_session'] + 1;
            $result = DB::nonQuery("
                    INSERT 
                    INTO 
                        `login_session`(
                        `id_login_session`, 
                        `access_token`, 
                        `code_token`, 
                        `describe`, 
                        `id_account`)
                    VALUES(
                        :login_session_id, 
                        CONCAT(CONV(':login_session_id', 10, 36), :random_string), 
                        :code_token, 
                        :describe, 
                        :account_id)
                ",
                [ 
                    ':describe' => $describe,
                    ':login_session_id' => $login_session_id,
                    ':code_token' => $code_token,
                    ':account_id' => $account->id_account,
                    ':random_string' => $randomString
                ]
            );
            if($result)
            {
                $result = DB::query("SELECT access_token, code_token FROM `login_session` WHERE `id_login_session` = {$login_session_id}");

                if(empty($result))
                {
                    return null;
                }
                else
                {
                    return new LoginSession($result[0]['code_token'], $result[0]['access_token']);
                }
            }
            else
            {
                return null;
            }
        }
    }
}