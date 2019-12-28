<?php

includeModel('DBMappingModule', 'MySQL/Account');
includeModel('DBMappingModule', 'MySQL/LoginSession');

class TestController{
    public function index(RoutingData $data){
        echo '<script src="/js/jquery-3.4.1.min.js"></script>';
        dd($data->request);
        //GRAPHQL request
        
    }
}