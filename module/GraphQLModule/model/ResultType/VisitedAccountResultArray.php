<?php

includeModel('GraphQLModule', 'ResultType/InterfaceResult');

class VisitedAccountResultArray implements InterfaceResult{
    private $account_array;

    public function __construct(array $account_array)
    {
        $this->account_array = $account_array;
    }

    public function toArray() : array{
        return $this->account_array;
    }
}