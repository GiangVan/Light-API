<?php

includeModel('AccountModule', 'AccountSession');
includeModel('DBMappingModule', 'MySQL/GameChannel');
includeModel('GraphQLModule', 'Resolve/Upload/GameChannelBackgroundUpload');

class AddNewGameChannel{   
    public static function resolve($args, RoutingData $data) : array{
        $result = [];

        $code_token = $args['auth']['code_token'];
        $access_token = $args['auth']['access_token'];
        $channel_name = $args['channel_name'];

        $account = AccountSession::getAccountByLoginSession($code_token, $access_token);
        if($account != null && $account->fetch(['id_position', 'id_account']))
        {
            if($account->id_position >= GlobalConfig::get('ADMIN_POSITION'))
            {
                $channel = new GameChannel($channel_name);
                if(!$channel->fetch(['channel_name']))
                {
                    $channel->id_account = $account->id_account;
                    if($channel->insert())
                    {
                        $channel->fetch();

                        //add game channel picture
                        $args['id_game_channel'] = $channel->id_game_channel;
                        GameChannelBackgroundUpload::resolve($args, $data);

                        return $channel->toArray();
                    }
                }
            }
        }

        return $result;
    }
}