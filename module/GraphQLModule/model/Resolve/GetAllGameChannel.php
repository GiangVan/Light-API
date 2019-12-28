<?php

includeModel('DBMappingModule', 'MySQL/GameChannel');

class GetAllGameChannel{
    public static function resolve() : array{
        $channel = new GameChannel(0);
        
        return $channel->getAll(['id_game_channel', 'channel_name', 'created_at']);
    }
}