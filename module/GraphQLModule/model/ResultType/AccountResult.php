<?php

includeModel('GraphQLModule', 'ResultType/InterfaceResult');

class AccountResult implements InterfaceResult{
    private $id_account;
    private $account_name;
    private $name;
    private $describe;
    private $password;
    private $email;
    private $phone;
    private $dir_path;
    private $created_at;
    private $id_position;

    public function __construct(array $array_account)
    {
        $this->id_account = $array_account['id_account'];
        $this->account_name = $array_account['account_name'];
        $this->name = $array_account['name'];
        $this->describe = $array_account['describe'];
        $this->password = $array_account['password'];
        $this->email = $array_account['email'];
        $this->phone = $array_account['phone'];
        $this->dir_path = $array_account['dir_path'];
        $this->created_at = $array_account['created_at'];
        $this->id_position = $array_account['id_position'];
    }

    public function toArray() : array{
        return [
            'id_account' => $this->id_account,
            'account_name' => $this->account_name,
            'name' => $this->name,
            'describe' => $this->describe,
            'password' => $this->password,
            'email' => $this->email,
            'phone' => $this->phone,
            'dir_path' => $this->dir_path,
            'created_at' => $this->created_at,
            'id_position' => $this->id_position,
        ];
    }
}