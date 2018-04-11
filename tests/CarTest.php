<?php
/**
 * Created by PhpStorm.
 * User: Luis Andre
 * Date: 4/11/2018
 * Time: 4:11 PM
 */

namespace Tests\Car;


use Car\Car;
use Car\Colors\Blue;
use Car\EngineInterface;
use Car\Engines\RocketEngine;
use PHPUnit\Framework\TestCase;

class CarTest extends TestCase {
    public function testItStarts() {
        //Creation du Mock
        $engine = $this->getMockForAbstractClass(EngineInterface::class);

        //Assertion
        //Utilisation du mock pour tester les methods
        $engine->expects($this->once())->method("turnOn");
        $engine->expects($this->never())->method("turnOff");

        //intancier et tester la voiture
        $car = new Car($engine, new Blue(), "testCar");
        $car->start();
    }

    public function testCarMaxSpeed() {
        $car = new Car(new RocketEngine(), new Blue(), "brandTest");
        $this->assertEquals(200, $car->getMaxSpeed());
    }

}