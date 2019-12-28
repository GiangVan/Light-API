<?php

class ServerHeaderInfoController{
    public function index(){
        dd(json_encode($_SERVER, JSON_PRETTY_PRINT));
    }
}