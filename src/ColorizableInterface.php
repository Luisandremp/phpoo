<?php

namespace Car;

use Car\Colors\Color;

interface ColorizableInterface {
    public function setColor(Color $color);

    public function getColor(): Color;
}