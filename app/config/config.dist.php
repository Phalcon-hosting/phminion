<?php

use PH\Minion\Role;

return new \Phalcon\Config(array(

    'application' => array(
        'baseUri'        => '/phminion/',
        'libraryDir'     => APPLICATION_PATH . '/library/',
    ),

    'roles' => array(

        Role::WEBSERVER => "PH\Minion\Role\WebServer",
        Role::DATABASE => "PH\Minion\Role\Database",

    )
));

