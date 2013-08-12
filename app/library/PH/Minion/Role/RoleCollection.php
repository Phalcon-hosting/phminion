<?php

namespace PH\Minion\Role;


class RoleCollection extends \ArrayObject implements \Phalcon\DI\InjectionAwareInterface {

    protected $di;

    public function offsetSet($index, $newval)
    {
        if( !is_a($newval,"PH\Minion\Role\AbstractRole"))
            trigger_error("Not an PH\Minion\Role\AbstractRole instance");

        parent::offsetSet($index, $newval);
    }

    public function setRole($name,\PH\Minion\Role\AbstractRole $role){
        $this[$name]=$role;
    }

    public function initialize($app){

        foreach($this as $roleName=>$role){

            $role->setUp();
            $role->setPrefix("/".$roleName);
            $app->mount($role);
        }

    }

    public function setDI ( $dependencyInjector){
        $this->di=$dependencyInjector;
    }

    public function getDi(){
        return $this->di;
    }

    public function getAvailableList(){

        $array=array();

        foreach($this as $roleName=>$role){
            $array[]=$roleName;
        }

        return $array;

    }

}