<?php

include "vendor/autoload.php";

/**
 * Uses
 */

use Car\Car;
use Car\Colors\Blue;
use Car\Colors\Pink;
use Car\Colors\Red;
use Car\Exception\NoSlotAvailableException;
use Car\Exception\VehicleHandledException;
use Car\Exception\VehicleNotInGarageException;
use Car\Garage;
use Car\Slot;


$pink = new pink;
$object = new Car($pink, "peugeot");
var_dump($object);

echo $pink;
echo "<br />";

$object->start();
$object->stop();

echo $object->getBrand();
echo "<br />";

echo $object;
echo "<hr />";


$garage = new Garage();
$garage
    ->addSlot(new Slot("slot1"))
    ->addSlot(new Slot("slot2"))
    ->addSlot(new Slot("slot3"));

$garage->receiveVehicle($object);

$object2 = new Car(new Red(), "Ferrari");
$object3 = new Car(new Red(), "Porsche");
$object4 = new Car(new Blue(), "Coccinelle");

try {
    $garage->receiveVehicle($object2);

    $garage->paintVehicle($object2, new Blue());
    var_dump($garage);

    $garage->releaseVehicle($object2);

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




