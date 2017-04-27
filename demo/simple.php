<?php

include_once dirname(__DIR__) . '/vendor/autoload.php';

class Lumper extends \Bavix\Lumper\Lumper {

    public function hello()
    {
        return $this->once(function () {
            return mt_rand();
        }, __FUNCTION__);
    }

    public function world()
    {
        return $this->once(function () {
            return mt_rand();
        });
    }

}

$lumper = new Lumper();
var_dump($lumper->hello());
var_dump($lumper->hello());
var_dump($lumper->world());
var_dump($lumper->world());

var_dump($lumper);
