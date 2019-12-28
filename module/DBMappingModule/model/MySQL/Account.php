<?php

class Account extends TableMappingModel{
    protected $use_primary_key_to_insert = true;

    public function __construct(string $account_name)
    {
        parent::__construct('account', ['account_name' => $account_name]);
    }

    public static function getAccountById(int $id) : ?Account{
        $result = DB::query("
                SELECT `account_name`
                FROM `account`
                WHERE `id_account` = :id
            ",
            [
                ':id' => $id
            ]
        );

        return $result == null ? null : new Account($result[0]['account_name']);
    }
}