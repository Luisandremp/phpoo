<?php
/**
 * Created by PhpStorm.
 * User: Luis Andre
 * Date: 4/11/2018
 * Time: 11:22 AM
 */

namespace Car;


interface SlotInterface {
    /**
     * SlotInterface constructor.
     * @param $name
     */
    public function __construct($name);

    /**
     * @param Vehicle $vehicle
     * @return mixed
     */
    public function takeSlot(Vehicle $vehicle);

    public function free();

    public function notAvailable(): bool;

    public function isAvailable(): bool;
}