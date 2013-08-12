<?php
/**
 * @author Soufiane Ghzal
 * @copyright PhalconHosting
 * @license This file is licensed under the proprietary License of PhalconHosting
 * @namespace PH\Minion
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