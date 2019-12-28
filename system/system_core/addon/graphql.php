<?php

require_once('../vendor/autoload.php');

use GraphQL\GraphQL;
use GraphQL\Utils\BuildSchema;

class GrafQL{
    private $schema;

    public function __construct(string $schema_path, array $resolves)
    {
        $contents = file_get_contents($schema_path);
        
        $schema = BuildSchema::build($contents, function($typeConfig, $typeDefinitionNode) use($resolves){
            if($typeConfig['name'] === 'Query')
            {
                $typeConfig['resolveField'] = function($rootValues, $args, $context, $info) use($resolves){
                    $fieldName = $info->fieldName;

                    if(isset($resolves['Query'][$fieldName]))
                    {
                        $result = $resolves['Query'][$fieldName]($rootValues, $args);
                        return $result == null ? null : $result->toArray();
                    }
                    else
                    {
                        if(is_array($rootValues) && count($rootValues) === 1)
                        {
                            foreach ($rootValues as $value) {
                                return $value;
                            }
                        }
                        else
                        {
                            return $rootValues;
                        }
                    }
                };
            }
            else if($typeConfig['name'] === 'Mutation')
            {
                $typeConfig['resolveField'] = function($rootValues, $args, $context, $info) use($resolves){
                    $fieldName = $info->fieldName;

                    if(isset($resolves['Mutation'][$fieldName]))
                    {
                        $result = $resolves['Mutation'][$fieldName]($rootValues, $args);
                        return $result == null ? null : $result->toArray();
                    }
                    else
                    {
                        if(is_array($rootValues) && count($rootValues) === 1)
                        {
                            foreach ($rootValues as $value) {
                                return $value;
                            }
                        }
                        else
                        {
                            return $rootValues;
                        }
                    }
                };
            }

            return $typeConfig;
        });

        $this->schema = $schema;
    }

    public function execute(string $query){
        try {  
            $result = GraphQL::executeQuery($this->schema, $query);
        } catch (\Exception $e) {
            $result = [
                'error' => [
                    'message' => $e->getMessage()
                ]
            ];
        }
        header('Content-Type: application/json');
        return json_encode($result->toArray(), JSON_PRETTY_PRINT);
    }
}

class GrafQLTest{
    private $schema;

    public function __construct(string $schema_path, array $resolves)
    {
        $contents = file_get_contents($schema_path);
        
        $schema = BuildSchema::build($contents, function($typeConfig, $typeDefinitionNode) use($resolves){
            $typeName = $typeConfig['name'];
            echo $typeName . ' -> ';

            $typeConfig['resolveField'] = function($rootValues, $args, $context, $info) use($typeName){
                echo json_encode([
                    'typeName' => $typeName,
                    'fieldName' => $info->fieldName,
                    'rootValues' => $rootValues,
                    'args' => $args,
                ], JSON_PRETTY_PRINT);

                if(is_array($rootValues) && count($rootValues) === 1)
                {
                    foreach ($rootValues as $value) {
                        return $value;
                    }
                }
                else
                {
                    return $rootValues;
                }
            };

            return $typeConfig;
        });

        $this->schema = $schema;
    }

    public function execute(string $query){
        try {  
            $result = GraphQL::executeQuery($this->schema, $query);
        } catch (\Exception $e) {
            $result = [
                'error' => [
                    'message' => $e->getMessage()
                ]
            ];
        }
        header('Content-Type: application/json');
        return json_encode($result->toArray());
    }
}