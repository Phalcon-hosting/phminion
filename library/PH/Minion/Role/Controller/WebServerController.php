<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bobito
 * Date: 8/11/13
 * Time: 5:40 PM
 * To change this template use File | Settings | File Templates.
 */

namespace PH\Minion\Role\Controller;


class WebServerController extends \Phalcon\Mvc\Controller {

    public function addUser(){
        // launch queue
        echo $this->di->get("response")->encode("Queued");
    }

}