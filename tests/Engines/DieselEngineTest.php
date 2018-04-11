<?php
/**
 * Created by PhpStorm.
 * User: Luis Andre
 * Date: 4/11/2018
 * Time: 3:14 PM
 */

namespace Tests\Car\Engines;


use Car\EngineInterface;
use Car\Engines\DieselEngine;
use PHPUnit\Framework\TestCase;

class DieselEngineTest extends TestCase {
    public function testItImplementsEngineInterface() {
        $dieselEngine = new DieselEngine();
        $this->assertInstanceOf(EngineInterface::class, $dieselEngine);
    }

}