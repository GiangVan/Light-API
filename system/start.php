<?php

require_once('autoload.php');

RouteHandler::start(new URLFormatting($_SERVER['REQUEST_URI']));