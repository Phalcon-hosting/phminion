<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bobito
 * Date: 8/11/13
 * Time: 5:36 PM
 * To change this template use File | Settings | File Templates.
 */

namespace PH\Minion\Role;


use PH\Minion\Role\Controller\DatabaseController;
use PH\Minion\Role\Controller\WebServerController;

class Database extends AbstractRole{

    /**
     * @inheritdoc
     */
    public function setup()
    {
        $this->setHandler(new DatabaseController());

        $this->get("/add/user","addUser");
    }




}