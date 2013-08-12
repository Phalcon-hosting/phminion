<?php

/**
 * Check for auth
 */
$app->before(function() use ($app) {
    // TODO token auth
    return true;
});

$app->after(function() use ($app) {
    //This is executed after the route was executed
    echo $app['response']->encode($app->getReturnedValue());
});


$app->get('/', function () use ($app) {
    echo $app['response']->encode("api home");
});



/**
 * Not found handler
 */
$app->notFound(function () use ($app) {
	$app->response->setStatusCode(404, "Not Found")->sendHeaders();
    return "404";
});


$app->map("/status",function() use ($app) {
    $list = $app['roles']->getAvailableList();
    return $list;
});


include APPLICATION_PATH . "/app-roles-hook.php";

// initialize the roles in this application
$app['roles']->initialize($app);