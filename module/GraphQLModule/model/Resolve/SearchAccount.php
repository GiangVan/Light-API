<?php

includeModel('DBMappingModule', 'MySQL/Account');

class SearchAccount{
    public static function resolve($args) : array{
        $name = '%' . $args['by_name'] . '%';

        return DB::query("
                SELECT `id_account`, `name`, `describe`, `dir_path`
                FROM `account`
                WHERE `name` LIKE :name
            ",
            [
                ':name' => $name
            ]
        );
    }
}