<?php

includeModel('AccountModule', 'AccountSession');
includeModel('DBMappingModule', 'MySQL/Feedback');

class SendFeedback{
    public static function resolve($args) : array{
        $result = false;
        $describe = '';
        $account_id = null;
        $content = $args['content'];

        if(isset($args['auth']))
        {
            $code_token = $args['auth']['code_token'];
            $access_token = $args['auth']['access_token'];
            $account = AccountSession::getAccountByLoginSession($code_token, $access_token);
            if($account != null && $account->fetch(['id_account']))
            {
                $account_id = $account->id_account;
            }
        }

        $feedback = new Feedback(-1);
        $feedback->content = $content;
        $feedback->id_account = $account_id;
        $result = $feedback->insert();

        return compact('result', 'describe');
    }
}