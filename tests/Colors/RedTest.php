<?php
/**
 * Created by PhpStorm.
 * User: Luis Andre
 * Date: 4/11/2018
 * Time: 2:30 PM
 */

namespace Tests\Car\Colors;


use Car\Colors\Color;
use Car\Colors\Red;
use PHPUnit\Framework\TestCase;

class RedTest extends TestCase {
    public function testItExtendsColor() {
        $red = new Red();
        $this->assertInstanceOf(Color::class, $red);
    }

    public function testBlueProperties() {
        $red = new Red();
        $this->assertEquals("Red", $red->getName());
        $this->assertEquals("#FF0000", $red->getHexaCode());
    }
}