<?php

includeModel('GraphQLModule', 'ResultType/InterfaceResult');

class AuthResult implements InterfaceResult{
    private $access_token;
    private $code_token;

    public function __construct(string $access_token, string $code_token)
    {
        $this->access_token = $access_token;
        $this->code_token = $code_token;
    }

    public function toArray() : array{
        return [
            'code_token' => $this->code_token,
            'access_token' => $this->access_token
        ];
    }
}