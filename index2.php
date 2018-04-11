<?php
/**
 * Created by PhpStorm.
 * User: Luis Andre
 * Date: 4/11/2018
 * Time: 9:15 AM
 */
include "vendor/autoload.php";

use Car\Car;
use Car\Colors\Pink;
use Car\Colors\Red;
use Car\Engines\DieselEngine;
use Car\Engines\RocketEngine;
use Car\Exception\NoSlotAvailableException;
use Car\Exception\VehicleHandledException;
use Car\Exception\VehicleNotInGarageException;
use Car\Garage;
use Car\Slots\Slot;
use Car\Slots\SuperSlot;

$pink = new Pink();
$dieselEngine = new  DieselEngine();
$rocketEngine = new RocketEngine();

$obj = new Car($dieselEngine, $pink, "Peugeot");
$obj2 = new Car($rocketEngine, new Red(), "Ferrari");

$obj->start();
$obj->stop();

$garage = new Garage();
$garage->addSlot(new SuperSlot("SuperSlot 01"));
$garage->addSlot(new Slot("Slot 01"));
try {
    $garage->receiveVehicle($obj);
    $garage->receiveVehicle($obj2);

    $garage->releaseVehicle(new Car($rocketEngine, new Red(), "Ferrari"));

} catch (VehicleHandledException $e) {
    echo $e->getMessage();
    echo "<br />";
    echo $e->getTraceAsString();
} catch (NoSlotAvailableException $e) {
    echo $e->getMessage();
    echo "<br />";
    echo $e->getTraceAsString();
} catch (VehicleNotInGarageException $e) {
    echo $e->getMessage();
    echo "<br />Client débile";
}
var_dump($garage);
