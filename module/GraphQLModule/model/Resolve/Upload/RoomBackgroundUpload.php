<?php

includeModel('GraphQLModule', 'UploadFileManagement');
includeModel('AccountModule', 'AccountSession');

class RoomBackgroundUpload{
    public static function resolve($args, RoutingData $data) : array{
        $fileTypesSupported = ['JPG'];
        $code_token = $args['auth']['code_token'];
        $access_token = $args['auth']['access_token'];
        $room_id = $args['room_id'];
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
                if($account != null && $account->fetch(['id_account']))
                {
                    $file_path = GlobalConfig::get('IMG_ROOM_PATH') . $room_id . $account->id_account . '/BACKGROUND.JPG';

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
                    $describe = 'account not found.';
                }
            }
        }

        return compact('describe', 'path');
    }
}