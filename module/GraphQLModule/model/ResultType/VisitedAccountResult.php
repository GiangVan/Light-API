<?php

includeModel('GraphQLModule', 'ResultType/InterfaceResult');

class VisitedAccountResult implements InterfaceResult{
    private $id_account;
    private $name;
    private $describe;
    private $dir_path;

    public function __construct(array $array_account)
    {
        $this->id_account = $array_account['id_account'];
        $this->name = $array_account['name'];
        $this->describe = $array_account['describe'];
        $this->dir_path = $array_account['dir_path'];
    }

    public function toArray() : array{
        return [
            'id_account' => $this->id_account,
            'name' => $this->name,
            'describe' => $this->describe,
            'dir_path' => $this->dir_path,
        ];
    }
}