<?php

namespace Car;
class Moto extends Vehicle {
    public function start(): bool {
        // TODO: Implement start() method.
        echo "démarrage <br />";
        return true;
    }

    public function stop(): bool {
        // TODO: Implement stop() method.
        return true;
    }


    public function __toString() {
        // TODO: Implement __toString() method. allows to display the object into a string type when using the "echo" in the main file
        return __CLASS__;
    }
}