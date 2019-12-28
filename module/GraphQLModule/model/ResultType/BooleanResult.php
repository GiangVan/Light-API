<?php

includeModel('GraphQLModule', 'ResultType/InterfaceResult');

class BooleanResult implements InterfaceResult{
    private $result;
    private $describe;

    public function __construct(bool $result, string $describe = '')
    {
        $this->result = $result;
        $this->describe = $describe;
    }

    public function toArray() : array{
        return [
            'result' => $this->result,
            'describe' => $this->describe
        ];
    }
}