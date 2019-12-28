<?php

includeModel('AccountModule', 'AccountSession');
includeModel('DBMappingModule', 'MySQL/Feedback');

class GetAllFeedback{
    public static function resolve($args) : array{
        $code_token = $args['auth']['code_token'];
        $access_token = $args['auth']['access_token'];
        $result = [];

        $account = AccountSession::getAccountByLoginSession($code_token, $access_token);
        if($account != null && $account->fetch(['id_account', 'id_position']))
        {
            if($account->id_position >= GlobalConfig::get('ADMIN_POSITION'))
            {
                $feedback = new Feedback(-1);
                $result = $feedback->getAll(['content', 'created_at', 'id_account']);
            }
            else
            {
                $describe = 'access denied.';
            }
        }
        else
        {
            $describe = 'account not found.';
        }

        return $result;
    }
}