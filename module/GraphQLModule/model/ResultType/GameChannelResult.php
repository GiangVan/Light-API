<?php

includeModel('GraphQLModule', 'ResultType/InterfaceResult');

class GameChannelResult implements InterfaceResult{
    private $channel_name;
    private $created_at;
    private $id_game_channel;

    public function __construct(array $array_game)
    {
        $this->created_at = $array_game['created_at'];
        $this->channel_name = $array_game['channel_name'];
        $this->id_game_channel = $array_game['id_game_channel'];
    }

    public function toArray() : array{
        return [
            'channel_name' => $this->channel_name,
            'created_at' => $this->created_at,
            'id_game_channel' => $this->id_game_channel,
        ];
    }
}