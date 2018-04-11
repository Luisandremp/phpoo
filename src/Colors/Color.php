<?php

namespace Car\Colors;
abstract class Color {
    protected $name;
    protected $hexaCode;


    public function __toString() {
        return $this->getName();
    }

    /**
     * return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * return string
     */
    public function getHexaCode(): string {
        return $this->hexaCode;
    }
}