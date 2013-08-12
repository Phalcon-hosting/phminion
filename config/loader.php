<?php

/**
 * Registering an autoloader
 */
$loader = new \Phalcon\Loader();





$loader->registerNamespaces(
    array(
        'PH' => 	$config->application->libraryDir . 'PH',
        'Phalcon' => $config->application->libraryDir . 'Phalcon'
    )
);


$loader->register();