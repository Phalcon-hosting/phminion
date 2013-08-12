phminion
========

Phalcon hosting minion agent (role server)


Installing
-------------


Run composer to install dependencies :

```
composer install
```


Copy the ```app/config/config.dist.php``` to ```app/config/config.php``` and update the content

In the config file you can add some roles. Each role matches with a server service (e.g webserver, database, ssh...) :

Example of ```config.php``` :

```
<?php

use PH\Minion\Role;

return new \Phalcon\Config(array(

    'application' => array(
        'baseUri'        => '/',
        'libraryDir'     => APPLICATION_PATH . '/library/',
    ),

    'roles' => array(

        Role::WEBSERVER => "PH\Minion\Role\WebServer",
        Role::DATABASE => "PH\Minion\Role\Database",

    )
));

```

Checking services
--------------

Check that the api works well by calling /status

example of ```http://phminion.local/status```:

```
["webserver","database"]
```