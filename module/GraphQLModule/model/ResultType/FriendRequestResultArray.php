<?php

includeModel('GraphQLModule', 'ResultType/InterfaceResult');

class FriendRequestResultArray implements InterfaceResult{
    private $request_array;

    public function __construct(array $request_array)
    {
        $this->request_array = $request_array;
    }

    public function toArray() : array{
        return $this->request_array;
    }
}