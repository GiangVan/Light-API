<?php

class DocumentController{
    public function index(RoutingData $data){
        //normal login
        $input = array(
            'user_name' => 'user name (max length 32 characters)',
            'password' => 'password must be hashed by SHA256',
            'discribe' => 'info of client hardware (max length 32 characters)'
        );
        $success = array(
            'code_token' => 'used to save the login session at client local',
            'access_token' => 'used to save the login session at client local'
        );
        $fail = '0';
        $describe = '';
        $model[0] = array(
            'title' => 'Normal Log In', 
            'method' => 'POST',
            'endpoint' => 'log/login', 
            'input' => json_encode($input, JSON_PRETTY_PRINT),
            'success' => json_encode($success, JSON_PRETTY_PRINT),
            'fail' => $fail,
            'describe' => $describe
        );
        //log out
        $input = array(
            'code_token' => '',
            'access_token' => ''
        );
        $success = '1';
        $fail = '0';
        $describe = 'whenever a user logs out, we must use this API to remove their login session that was saved on Database';
        array_push($model, array(
            'title' => 'Log Out', 
            'method' => 'POST',
            'endpoint' => 'log/logout', 
            'input' => json_encode($input, JSON_PRETTY_PRINT),
            'success' => $success,
            'fail' => $fail,
            'describe' => $describe
        ));
        //get Facebook's login-url
        $input = '';
        $success = '';
        $fail = '';
        $describe = '';
        array_push($model, array(
            'title' => 'Get Facebook\'s Login-URL', 
            'method' => 'GET',
            'endpoint' => 'log/facebook/geturl', 
            'input' => $input,
            'success' => $success,
            'fail' => $fail,
            'describe' => $describe
        ));
        //get user's profile
        $input = array(
            'code_token' => '',
            'access_token' => ''
        );
        $success = array(
            "name" => "Nguyễn Ðức Hoàng",
            "describe" => null,
            "created_at" => "2019-10-09 18:52:32",
            "email" => null,
            "phone" => null,
            "avatar_path" => null,
            "account_name" => "hoang",
            "position" => "master"
        );
        $fail = '0';
        $describe = '';
        array_push($model, array(
            'title' => 'Get User\'s Profile', 
            'method' => 'POST',
            'endpoint' => 'user/profile', 
            'input' => json_encode($input, JSON_PRETTY_PRINT),
            'success' => json_encode($success, JSON_PRETTY_PRINT),
            'fail' => $fail,
            'describe' => $describe
        ));
        //
        callView('DevModule', 'DocumentView', ['model' => $model]);
    }
}

