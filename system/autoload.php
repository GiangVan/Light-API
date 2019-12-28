<?php

call_user_func(function (){
    //infrastructure
    require_once('system_core/supporting_function/array.php');
    require_once('system_core/supporting_function/routing.php');
    require_once('system_core/supporting_function/string.php');
    require_once('system_core/supporting_function/js_helper.php');
    require_once('system_core/supporting_function/testing.php');
    require_once('system_core/supporting_function/file.php');
    require_once('system_core/url/entity/url_formatting.php');
    require_once('system_core/error_management/controller/error_message.php');
    require_once('system_core/error_management/entity/error_param.php');
    require_once('system_core/error_management/controller/error_display.php');
    require_once('system_core/error_management/controller/error_handler.php');
    require_once('system_core/configuration_management/entity/configuration.php');
    require_once('system_core/configuration_management/controller/configuration.php');
    require_once('../config/system.php');
    require_once('system_core/module_management/entity/class_fragments.php');
    require_once('system_core/module_management/controller/module_actualization.php');
    require_once('system_core/module_management/controller/module_handler.php');
    require_once('system_core/routing/entity/mapping_trace.php');
    require_once('system_core/routing/entity/configuration_path.php');
    require_once('system_core/routing/entity/routing_mapping_tree.php');
    require_once('system_core/routing/entity/routing_data.php');
    require_once('system_core/routing/controller/route_checking.php');
    require_once('system_core/routing/controller/route_mapping.php');
    require_once('system_core/routing/controller/route_handler.php');
    //database
    require_once('system_core/database/PDO.php');
    require_once('system_core/database/TableMappingModel.php');
    //
    require_once('../config/global.php');
    //add-on
    require_once('system_core/addon/graphql.php');
});

//receive route files
call_user_func(function (){
    $container_folder = SystemConfig::get('ROUTE_FOLDER');
    $route_file_list = SystemConfig::get('ROUTE_FILE_LIST');

    foreach ($route_file_list as $value) {
        require_once('../' . $container_folder . $value . '.php');
    }
});

