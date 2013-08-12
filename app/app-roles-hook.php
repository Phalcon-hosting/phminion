<?php
/**
 * @author Soufiane Ghzal
 * @copyright PhalconHosting
 * @license This file is licensed under the proprietary License of PhalconHosting
 * @namespace PH\Minion
 */


use \PH\Minion\Role;

// we add the webserver role to the api

foreach($config->roles as $roleName=>$class){
    $app['roles']->setRole($roleName, new $class()  );
}