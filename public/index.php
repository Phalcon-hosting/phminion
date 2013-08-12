<?php

error_reporting(E_ALL);
ini_set('display_errors',1);


try {

    // Define path to application directory
    defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/..'));


    // Define application environment
    // Change 'development' to 'production' once the application is up and running on the production site
    defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));


	/**
	 * Read the configuration
	 */
	$config = include __DIR__ . '/../config/config.php';

	/**
	 * Include Services
	 */
	include __DIR__ . '/../config/services.php';

	/**
	 * Include Services
	 */
	include __DIR__ . '/../config/loader.php';

	/**
	 * Starting the application
 	*/
	$app = new \Phalcon\Mvc\Micro();

	/**
	 * Assign service locator to the application
	 */
	$app->setDi($di);

	/**
	 * Incude Application
	 */
	include __DIR__ . '/../app.php';

	/**
	 * Handle the request
	 */
	$app->handle();

} catch (Phalcon\Exception $e) {
	echo $e->getMessage();
} catch (PDOException $e){
	echo $e->getMessage();
}