<?php
/**
 * Created by PhpStorm.
 * User: Luis Andre
 * Date: 4/11/2018
 * Time: 10:15 AM
 */

namespace Car\Engines;

use Car\EngineInterface;

class RocketEngine implements EngineInterface {
    function turnOn() {
        echo __METHOD__ . "<br>";
    }

    function turnOff() {
        echo __METHOD__ . "<br>";
    }

}