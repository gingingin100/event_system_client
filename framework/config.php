<?php

define('APP_ROOT_DIR', basename(dirname(__DIR__)));
define('ROOT_DIR', dirname(__DIR__));
    define('APP_DIR', ROOT_DIR . DIRECTORY_SEPARATOR . 'app');
        define('CONTROLLER_DIR', APP_DIR . DIRECTORY_SEPARATOR . 'controllers');
        define('MODEL_DIR', APP_DIR . DIRECTORY_SEPARATOR . 'models');
        define('VIEW_DIR', APP_DIR . DIRECTORY_SEPARATOR . 'views');
    define('FRAMEWORK_DIR',ROOT_DIR . DIRECTORY_SEPARATOR .'framework');
        define('ABSTRACT_DIR', FRAMEWORK_DIR . DIRECTORY_SEPARATOR . 'abstracts');
        define('ROUTE_DIR', FRAMEWORK_DIR . DIRECTORY_SEPARATOR . 'routes');
        define('LAYOUT_DIR', FRAMEWORK_DIR . DIRECTORY_SEPARATOR . 'layout');

//DATABASE STUFF
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'db');
define('DB_NAME', 'event_management');

define('TEST_SERVER','104.197.114.36');
define('APP_ROOT_URL', 'http://' . $_SERVER['HTTP_HOST'].'/event_system_client');

