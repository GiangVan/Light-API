<?php

class Feedback extends TableMappingModel{

    public function __construct(int $id_feedback)
    {
        parent::__construct('feedback', ['id_feedback' => $id_feedback]);
    }
}