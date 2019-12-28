<?php

class RouteHandler{
    public static function start(URLFormatting $formatted_url){
        $http_method = $_SERVER['REQUEST_METHOD'];
        RouteChecking::httpMethodSupported();
        
        $mapped_data_list = RouteMapping::getAllMappedData($http_method, $formatted_url);
        RouteChecking::existMappedData($mapped_data_list);

        $routing_data = new RoutingData($_FILES, RoutingData::getHttpMethodData($http_method));
        $routing_data = ModuleHandler::executeController($mapped_data_list, $routing_data);
    }
}