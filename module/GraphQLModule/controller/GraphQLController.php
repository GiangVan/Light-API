<?php

class GraphQLController{
    public function execute(RoutingData $data){
        $resolves = $data->controller['resolves'];
        $graphql = new GrafQL(GlobalConfig::get('SCHEMA_PATH'), $resolves);
        $result = isset($data->request[GlobalConfig::get('QUERY')]) ? $graphql->execute($data->request[GlobalConfig::get('QUERY')]) : null;
        
        return $result;
    }
}