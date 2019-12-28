<?php

includeModel('GraphQLModule', 'ResultType/InterfaceResult');

class GameChannelResultArray implements InterfaceResult{
    private $game_channel_array;

    public function __construct(array $game_channel_array)
    {
        $this->game_channel_array = $game_channel_array;
    }

    public function toArray() : array{
        return $this->game_channel_array;
    }
}