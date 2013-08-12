<?php
/**
 * @author Soufiane Ghzal
 * @copyright PhalconHosting
 * @license This file is licensed under the proprietary License of PhalconHosting
 * @namespace PH\Minion
 */



namespace PH\Minion\Role\Controller;


class DatabaseController extends \Phalcon\Mvc\Controller {

    public function addUser(){
        // launch queue
        return "db:Queued";
    }

}