<?php

use \PH\Minion\Role;

/**
 * Add your routes here
 */
$app->get('/', function () use ($app) {
    echo $app['response']->encode("api home");
});

/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
	$app->response->setStatusCode(404, "Not Found")->sendHeaders();
	echo "ll";
});




// TODO automate this step from a config file/or something dependant on the minion
// we add the webserver role to the api
$app['roles']->setRole(Role::WEBSERVER, new Role\WebServer()  );

// initialize the roles in this application
$app['roles']->initialize($app);