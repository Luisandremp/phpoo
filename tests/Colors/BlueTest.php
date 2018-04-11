<?php
/**
 * Created by PhpStorm.
 * User: Luis Andre
 * Date: 4/11/2018
 * Time: 2:30 PM
 */

namespace Tests\Car\Colors;


use Car\Colors\Blue;
use Car\Colors\Color;
use PHPUnit\Framework\TestCase;

class BlueTest extends TestCase {
    public function testItExtendsColor() {
        $blue = new Blue();
        $this->assertInstanceOf(Color::class, $blue);
    }

    public function testBlueProperties() {
        $blue = new Blue();
        $this->assertEquals("Blue", $blue->getName());
        $this->assertEquals("#0000FF", $blue->getHexaCode());
    }
}