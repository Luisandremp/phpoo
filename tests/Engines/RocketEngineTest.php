<?php
/**
 * Created by PhpStorm.
 * User: Luis Andre
 * Date: 4/11/2018
 * Time: 3:17 PM
 */

namespace Tests\Car\Engines;


use Car\EngineInterface;
use Car\Engines\RocketEngine;
use PHPUnit\Framework\TestCase;

class RocketEngineTest extends TestCase {

    public function testItImplementsEngineInterface() {
        $rocketEngine = new RocketEngine();
        $this->assertInstanceOf(EngineInterface::class, $rocketEngine);
    }

}