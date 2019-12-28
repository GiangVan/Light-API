<?php

includeModel('GraphQLModule', 'UploadFileManagement');
includeModel('AccountModule', 'AccountSession');

class GameChannelBackgroundUpload{
    public static function resolve($args, RoutingData $data) : array{
        $fileTypesSupported = ['JPG'];
        $code_token = $args['auth']['code_token'];
        $access_token = $args['auth']['access_token'];
        $id_game_channel = $args['id_game_channel'];
        $file = $data->file['img'] ?? null;
        $describe = 'No file sent.';
        $path = null;

        if($file !== null)
        {
            $file = new UploadFileManagement($file);
            $describe = $file->checkFile($fileTypesSupported);
            
            if($describe === 'success')
            {
                $account = AccountSession::getAccountByLoginSession($code_token, $access_token);
                if($account != null && $account->fetch(['id_account', 'id_position']))
                {
                    if($account->id_position >= GlobalConfig::get('ADMIN_POSITION'))
                    {
                        $file_path = GlobalConfig::get('IMG_GAME_PATH') . $id_game_channel . $account->id_account . '/BACKGROUND.JPG';

                        $result = $file->saveFile($file_path);

                        if($result)
                        {
                            $path = $file_path;
                        }
                        else
                        {
                            $describe = 'file save failed.';
                        }
                    }
                    else
                    {
                        $describe = 'access denied.';
                    }
                }
                else
                {
                    $describe = 'account not found.';
                }
            }
        }

        return compact('describe', 'path');
    }
}