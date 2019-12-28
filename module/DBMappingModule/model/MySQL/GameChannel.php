<?php

class GameChannel extends TableMappingModel{
    protected $use_primary_key_to_insert = true;

    public function __construct(string $channel_name)
    {
        parent::__construct('game_channel', [
                                                'channel_name' => $channel_name, 
        ]);
    }
}
