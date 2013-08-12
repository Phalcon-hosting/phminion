<?php

use \PH\Minion\Role;

// we add the webserver role to the api

foreach($config->roles as $roleName=>$class){
    $app['roles']->setRole($roleName, new $class()  );
}