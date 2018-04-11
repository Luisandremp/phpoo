<?php
/**
 * Created by PhpStorm.
 * User: Luis Andre
 * Date: 4/11/2018
 * Time: 2:30 PM
 */

namespace Tests\Car\Colors;


use Car\Colors\Black;
use Car\Colors\Color;
use PHPUnit\Framework\TestCase;

class BlackTest extends TestCase {
    public function testItExtendsColor() {
        $black = new Black();
        $this->assertInstanceOf(Color::class, $black);
    }

    public function testBlackProperties() {
        $black = new Black();
        $this->assertEquals("Black", $black->getName());
        $this->assertEquals("#000000", $black->getHexaCode());
    }
}