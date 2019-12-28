<?php

class LoginSession extends TableMappingModel{

    public function __construct(string $code_token, string $access_token)
    {
        parent::__construct('login_session', [
                                                'access_token' => $access_token, 
                                                'code_token' => $code_token 
        ]);
    }
}
