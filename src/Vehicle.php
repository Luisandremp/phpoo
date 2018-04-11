<?php

namespace Car;

abstract class Vehicle {
    protected $brand;

    abstract public function start(): bool;

    abstract public function stop(): bool;

    private function internalEngine() {
        return "nop !";
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function getBrand() {
        return ucfirst(strtolower($this->brand));
    }

}