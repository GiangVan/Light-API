<?php

//
ini_set('strict_types', 1);
ini_set('file_uploads', 1);
ini_set('upload_max_filesize', '8M');
// ini_set('memory_limit', '1024M');
date_default_timezone_set('Asia/Ho_Chi_Minh');
ini_set('max_execution_time', 200);
//display all possible errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

//for database
SystemConfig::addRange(array(
    'DB_TYPE' => 'mysql',
    'DB_HOST_NAME' => '127.0.0.1',
    'DB_USER_NAME' => 'root',
    'DB_NAME' => 'gaming_community',
    'DB_PASSWORD' => '',
    'DB_DISPLAY_ERROR' => true
));

//for framework
SystemConfig::add('SUPPORTED_HTTP_METHOD', ['GET', 'POST']);
SystemConfig::add('ROUTE_FILE_LIST', ['graphql', 'dev']);

SystemConfig::add('MODULE_FOLDER', 'module/');
SystemConfig::add('ROUTE_FOLDER', 'route/');
SystemConfig::add('MIDDLEWARE_FOLDER', 'middleware/');
SystemConfig::add('MODEL_FOLDER', 'model/');
SystemConfig::add('CONTROLLER_FOLDER', 'controller/');
SystemConfig::add('VIEW_FOLDER', 'view/');
SystemConfig::add('DIRECTION_EXTENSION', '../');

SystemConfig::add('METHOD_CHAR', '@');
SystemConfig::add('OPTION_CHAR', '#');

