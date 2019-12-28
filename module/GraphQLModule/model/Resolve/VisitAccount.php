<?php

includeModel('DBMappingModule', 'MySQL/Account');

class VisitAccount{
    public static function resolve($args) : array{
        $result = [];

        $account_id = $args['account_id'];

        $account = Account::getAccountById($account_id);
        if($account !== null)
        {
            if($account->fetch())
            {
                $result = $account->toArray();
            }
        }

        return $result;
    }
}