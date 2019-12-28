<?php

includeModel('GraphQLModule', 'ResultType/InterfaceResult');

class UploadResult implements InterfaceResult{
    private $path;
    private $describe;

    public function __construct(?string $path, string $describe = '')
    {
        $this->path = $path;
        $this->describe = $describe;
    }

    public function toArray() : array{
        return [
            'path' => $this->path,
            'describe' => $this->describe
        ];
    }
}