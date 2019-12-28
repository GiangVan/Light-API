<?php

includeModel('AccountModule', 'AccountSession');
includeModel('DBMappingModule', 'MySQL/GameChannel');
includeModel('GraphQLModule', 'Resolve/Upload/GameChannelBackgroundUpload');

class EditGameChannel{   
    public static function resolve($args, RoutingData $data) : array{
        $result = [];

        $code_token = $args['auth']['code_token'];
        $access_token = $args['auth']['access_token'];
        $old_name = $args['old_name'];
        $new_name = $args['new_name'];

        $account = AccountSession::getAccountByLoginSession($code_token, $access_token);
        if($account != null && $account->fetch(['id_position', 'id_account']))
        {
            if($account->id_position >= GlobalConfig::get('ADMIN_POSITION'))
            {
                $channel = new GameChannel($new_name);
                if(!$channel->fetch(['id_game_channel']))
                {
                    $channel = new GameChannel($old_name);
                    if($channel->fetch(['id_game_channel']))
                    {
                        $id = $channel->id_game_channel;
                        $newGame = new TableMappingModel('game_channel', ['id_game_channel' => $id]);
                        $newGame->fetch();
                        $newGame->channel_name = $new_name;
                        if($newGame->update())
                        {
                            $result = $newGame->toArray();
                        }
                    }
                }
            }
        }

        return $result;
    }
}