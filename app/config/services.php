<?php

use Phalcon\Mvc\View,
	Phalcon\Mvc\Url as UrlResolver,
	Phalcon\DI\FactoryDefault;

$di = new FactoryDefault();

/**
 * Sets the response handler
 */
$di['response'] = function() use ($config) {

    $json = new \PH\Minion\Response\Json();
	return $json;
};

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di['url'] = function() use ($config) {
	$url = new UrlResolver();
	$url->setBaseUri($config->application->baseUri);
	return $url;
};



/**
 * add the rolebag to the application
 */
$di['roles'] = function() use ($config) {
    return new \PH\Minion\Role\RoleCollection();
};