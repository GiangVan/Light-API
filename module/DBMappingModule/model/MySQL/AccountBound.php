<?php

class AccountBound extends TableMappingModel{

    public function __construct(int $id_sender, int $id_receiver)
    {
        parent::__construct('account_bound', [
            'id_sender' => $id_sender, 
            'id_receiver' => $id_receiver 
        ]);
    }
}