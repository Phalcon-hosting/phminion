<?php
/**
 * @author Soufiane Ghzal
 * @copyright PhalconHosting
 * @license This file is licensed under the proprietary License of PhalconHosting
 * @namespace PH\Minion
 */


error_reporting(E_ALL);
ini_set('display_errors',1);


try {

    // Define path to application directory
    defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../app'));


    // Define application environment
    // Change 'development' to 'production' once the application is up and running on the production site
    defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));


    /**
     * Include Autoloader
     */
    include APPLICATION_PATH . '/config/loader.php';

	/**
	 * Read the configuration
	 */
	$config = include APPLICATION_PATH . '/config/config.php';

	/**
	 * Include Services
	 */
	include APPLICATION_PATH . '/config/services.php';


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
	include APPLICATION_PATH . '/app.php';

	/**
	 * Handle the request
	 */
	$app->handle();

} catch (Phalcon\Exception $e) {
	echo $e->getMessage();
} catch (PDOException $e){
	echo $e->getMessage();
}