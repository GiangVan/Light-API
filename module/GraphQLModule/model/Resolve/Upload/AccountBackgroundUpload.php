<?php

includeModel('GraphQLModule', 'UploadFileManagement');
includeModel('AccountModule', 'AccountSession');

class AccountBackgroundUpload{
    public static function resolve($args, RoutingData $data) : array{
        $fileTypesSupported = ['JPG'];
        $code_token = $args['auth']['code_token'];
        $access_token = $args['auth']['access_token'];
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
                if($account != null && $account->fetch(['id_account', 'dir_path']))
                {
                    $file_path = GlobalConfig::get('IMG_ACCOUNT_PATH') . $account->id_account . $account->dir_path . '/BACKGROUND.JPG';

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