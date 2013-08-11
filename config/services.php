<?php

use Phalcon\Mvc\View,
	Phalcon\Mvc\Url as UrlResolver,
	Phalcon\DI\FactoryDefault,
	Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

$di = new FactoryDefault();

/**
 * Sets the view component
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
 * Database connection is created based in the parameters defined in the configuration file
 */
$di['db'] = function() use ($config) {
	return new DbAdapter(array(
		"host" => $config->database->host,
		"username" => $config->database->username,
		"password" => $config->database->password,
		"dbname" => $config->database->dbname
	));
};

/**
 * add the rolebag to the application
 */
$di['roles'] = function() use ($config) {
    return new \PH\Minion\Role\RoleCollection();
};