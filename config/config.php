<?php

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'    => 'Mysql',
		'host'       => 'localhost',
		'username'   => 'root',
		'password'   => '',
		'dbname'     => 'test',
	),
	'application' => array(
		'baseUri'        => '/phminion/',
        'libraryDir'     => APPLICATION_PATH . '/library/',
	)
));

