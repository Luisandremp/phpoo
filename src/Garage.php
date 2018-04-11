<?php

namespace Car;

use Car\Colors\Color;
use Car\Exception\NoSlotAvailableException;
use Car\Exception\VehicleHandledException;
use Car\Exception\VehicleNotInGarageException;

class Garage {
    /**
     * @var array
     */
    private $slots = [];

    public function __construct() {
    }

    /**
     * @param Slot $slot
     * @return Garage
     */
    public function addSlot(SlotInterface $slot): Garage {
        $this->slots[] = $slot;

        return $this;
    }

    /**
     * @param Vehicle $vehicle
     * @throws NoSlotAvailableException;
     * @throws VehicleHandledException
     */
    public function receiveVehicle(Vehicle $vehicle) {
        if ($this->getVehicleSlot($vehicle) !== null) {
            throw new VehicleHandledException("Vehicle" . $vehicle->getBrand() . " is already handled");
        }

        $slot = $this->getAvailableSlot();

        // Si Vehicle Colorizable
        if ($vehicle instanceof ColorizableInterface) {
            $slot->takeSlot($vehicle);
            echo $slot->getName() . " taken with " . $vehicle->getBrand() . "<br />";
            // Else not accepted
        } else {
            echo "Access not granted";
        }
    }

    /**
     * @param Vehicle $vehicle
     * @throws VehicleNotInGarageException
     */
    public function releaseVehicle(Vehicle $vehicle) {
        $slot = $this->getVehicleSlot($vehicle);
        if ($slot !== null) {
            $slot->free();

            // echo $slot->getName() . " released vehicle " . $vehicle->getBrand(). " !";
            echo sprintf("%s released vehicle %s!", $slot->getName(), $vehicle->getBrand());
        } else {
            // Exception : ce vehicule n'est pas dans le garage
            throw new VehicleNotInGarageException("Vehicle is not here !");
        }
    }

    /**
     * @param Vehicle $vehicle
     * @param Color $color
     */
    public function paintVehicle(Vehicle $vehicle, Color $color) {
        // qu'elle soit déjà dans un slot
        if ($this->getVehicleSlot($vehicle) !== null) {
            $vehicle->setColor($color);
        }
    }

    // returns the first slot if its available
    public function getAvailableSlot(): SlotInterface {
        // filtre si un element est dans un tableau en applicant la fonction passée)
        $slots = array_filter(
            $this->slots,
            function (SlotInterface $slot) {
                return $slot->isAvailable();
            }
        );

        if (count($slots) > 0) {
            $slots = array_values($slots);
            return $slots[0];
        };

        /// throw exception
        throw new NoSlotAvailableException("No slot available");
    }

    public function getVehicleSlot(Vehicle $vehicle) {
        $slot = array_filter(
            $this->slots,
            function (SlotInterface $slot) use ($vehicle) {
                return $slot->getVehicle() === $vehicle;
            }
        );

        // On recopie le tableau en ecrasant les indexes
        if (count($slot) > 0) {
            $slot = array_values($slot)[0];
            return $slot;
        }
        return;
    }

    /**
     * @param Slot $slot
     */
    public function setSlot(SlotInterface $slot) {
        $this->slots[] = $slot;
    }
}