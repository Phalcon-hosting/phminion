<?php
/**
 * @author Soufiane Ghzal
 * @copyright PhalconHosting
 * @license This file is licensed under the proprietary License of PhalconHosting
 * @namespace PH\Minion
 */


namespace PH\Minion\Response;

class Json extends \Phalcon\Http\Response{

    public function encode($data){

        return json_encode($data);

    }



}