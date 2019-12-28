<?php

Mapping::get('dev/h%C6%B0%E1%BB%9Bng%20d%E1%BA%ABn', 'DocumentController@index', 'DevModule');
Mapping::get('dev/th%C3%B4ng%20tin%20m%C3%A1y%20ch%E1%BB%A7', 'ServerHeaderInfoController@index', 'DevModule');
Mapping::get('dev/test', 'TestController@index#echo', 'DevModule');

Mapping::get('dev/layout/1', 'LayoutController@page1', 'DevModule');
Mapping::get('dev/layout/2', 'LayoutController@page2', 'DevModule');

Mapping::get('', 'TestController@index#echo', 'DevModule');


