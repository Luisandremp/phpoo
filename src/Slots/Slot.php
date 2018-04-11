<?php

namespace Car\Slots;

use Car\SlotInterface;
use Car\Vehicle;

/**
 * Created by PhpStorm.
 * User: Jef_asus
 * Date: 09/04/2018
 * Time: 16:24
 */
class Slot implements SlotInterface {
    const SLOT_FREE = true;
    const SLOT_USED = false;

    private $state = self::SLOT_FREE;
    private $name;
    private $vehicle;

    /**
     * Slot constructor.
     * @param $name
     */
    public function __construct($name) {
        $this->name = $name;
    }

    public function takeSlot(Vehicle $vehicle) {
        $this->state = self::SLOT_USED;
        $this->vehicle = $vehicle;
    }

    public function free() {
        $this->state = self::SLOT_FREE;
        $this->vehicle = null;
    }

    public function notAvailable(): bool {
        return $this->state === self::SLOT_USED;
    }

    public function isAvailable(): bool {
        return $this->state === self::SLOT_FREE;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getVehicle() {
        return $this->vehicle;
    }


}