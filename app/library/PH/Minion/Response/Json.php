<?php

namespace PH\Minion\Response;

class Json extends \Phalcon\Http\Response{

    public function encode($data){

        return json_encode($data);

    }



}