<?php

includeModel('GraphQLModule', 'ResultType/InterfaceResult');

class FeedbackResultArray implements InterfaceResult{
    private $feedback_array;

    public function __construct(array $feedback_array)
    {
        $this->feedback_array = $feedback_array;
    }

    public function toArray() : array{
        return $this->feedback_array;
    }
}