<?php

namespace PH\Minion\Response;

class Json extends \Phalcon\DI\Injectable {

    public function encode($data){

        return json_encode($data);

    }

}