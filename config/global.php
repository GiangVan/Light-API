<?php

//Facebook API
GlobalConfig::addRange(array(
    'FACEBOOK_CONFIG' => array(
        'app_id' => '569470243818192',
        'app_secret' => '53c16eaa6cf50b4a768ef31fa93d7eed',
        'default_graph_version' => 'v4.0'
    ),
    'FACEBOOK_REDIRECT_URL' => 'https://'. $_SERVER['SERVER_NAME'] . '/log/facebook/callback',
    'FACEBOOK_PERMISSIONS' => []
));

//graphql
GlobalConfig::addRange(array(
    'SCHEMA_PATH' => '../schema.graphql',
    'QUERY' => 'query'
));

//
GlobalConfig::add('IMG_ACCOUNT_PATH', 'img/account/');
GlobalConfig::add('IMG_GAME_PATH', 'img/game_channel/');
GlobalConfig::add('IMG_ROOM_PATH', 'img/room/');

//account position
GlobalConfig::addRange(array(
    'BANNED_POSITION' => -1,
    'USER_POSITION' => 1,
    'ADMIN_POSITION' => 2,
    'MASTER_POSITION' => 3
));

//bound type
GlobalConfig::addRange(array(
    'BLOCKED_TYPE' => -1,
    'FRIEND_REQUEST_TYPE' => 1,
    'FRIEND_TYPE' => 2
));

GlobalConfig::add('MYSQL_DATE_FORMAT', 'Y-m-d H:i:s');
