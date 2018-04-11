<?php

namespace Car;

use Car\Colors\Blue;
use Car\Colors\Color;
use Car\Colors\Pink;
use Car\Colors\Red;


// declaration de la classe
Class Car extends Vehicle implements ColorizableInterface {
    //------------------------------------------------------------------------------
    // Constants
    //------------------------------------------------------------------------------
    const MAX_SPEED = 200;

    //------------------------------------------------------------------------------
    // Attributes
    //------------------------------------------------------------------------------
    private $color;
    private $engine;

    private $authColors = [Red::class, Blue::class, Pink::class];
    //------------------------------------------------------------------------------
    // Constructor - destructor
    //------------------------------------------------------------------------------
    public function __construct(EngineInterface $engine, Color $color, $brand) {
        $this->setColor($color);
        $this->setBrand($brand);
        $this->engine = $engine;
    }

    //------------------------------------------------------------------------------
    // Methods
    //------------------------------------------------------------------------------
    public function start(): bool {
        // TODO: Implement start() method.
        $this->engine->turnOn();

        return true;
    }

    public function stop(): bool {
        // TODO: Implement stop() method.
        $this->engine->turnOff();
        return true;
    }

    public function init() {
        echo "initialisation <br />";
    }

    public function __toString() {
        // TODO: Implement __toString() method. allows to display the object into a string type when using the "echo" in the main file
        return __CLASS__;
    }

    public function getMaxSpeed() {
        return self::MAX_SPEED;
    }

    // Checks if the Color is authorized
    private function isAuthColor(Color $color) {
        return in_array(get_class($color), $this->authColors);
    }

    //------------------------------------------------------------------------------
    // Getters - Setters
    //------------------------------------------------------------------------------

    // INTERFACE
    public function getColor(): Color {
        return ucfirst(strtolower($this->color));
    }

    public function setColor(Color $color) {
        if ($this->isAuthColor($color)) {
            $this->color = $color;
        } else {
            $this->color = new Blue();
        }
    }
}