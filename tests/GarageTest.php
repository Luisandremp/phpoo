<?php
/**
 * Created by PhpStorm.
 * User: Luis Andre
 * Date: 4/11/2018
 * Time: 4:27 PM
 */

namespace Tests\Car;


use Car\Car;
use Car\Colors\Blue;
use Car\Engines\RocketEngine;
use Car\Garage;
use Car\Slots\Slot;
use PHPUnit\Framework\TestCase;


class GarageTest extends TestCase {
    /**
     * @expectedException  \Car\Exception\VehicleHandledException
     */
    public function testItThrowsExceptionWhenAddingTheSameCarTwice() {
        $garage = new Garage();
        $car = new Car(new RocketEngine(), new Blue(), "brandTest");
        $garage
            ->addSlot(new Slot("Slot 01"))
            ->addSlot(new Slot("Slot 02"));

        $garage->receiveVehicle($car);
        $garage->receiveVehicle($car);
    }

    /**
     * @expectedException  \Car\Exception\VehicleNotInGarageException
     */
    public function testItThrowsExceptionWhenReleasingAnUnknownVehicle() {

        $garage = new Garage();
        $car = new Car(new RocketEngine(), new Blue(), "brandTest");
        $garage
            ->addSlot(new Slot("Slot 01"));

        $garage->releaseVehicle($car);
    }

    /**
     * @expectedException  \Car\Exception\NoSlotAvailableException
     */
    public
    function testItThrowsExceptionWhenNoSlotIsAvailable() {

        $garage = new Garage();
        $car = new Car(new RocketEngine(), new Blue(), "brandTest");
        $car2 = new Car(new RocketEngine(), new Blue(), "brandTest");
        $garage->addSlot(new Slot("Slot 01"));

        $garage->receiveVehicle($car);
        $garage->receiveVehicle($car2);
    }

}