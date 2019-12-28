<?php

Mapping::post('graphql', 'PostResolveController@index', 'GraphQLModule');
Mapping::post('graphql', 'GraphQLController@execute#echo', 'GraphQLModule');