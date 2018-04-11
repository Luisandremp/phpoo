<?php
/**
 * Created by PhpStorm.
 * User: Luis Andre
 * Date: 4/11/2018
 * Time: 2:30 PM
 */

namespace Tests\Car\Colors;


use Car\Colors\Color;
use Car\Colors\Pink;
use PHPUnit\Framework\TestCase;

class PinkTest extends TestCase {
    public function testItExtendsColor() {
        $pink = new Pink();
        $this->assertInstanceOf(Color::class, $pink);
    }

    public function testBlueProperties() {
        $pink = new Pink();
        $this->assertEquals("Pink", $pink->getName());
        $this->assertEquals("#E5188C", $pink->getHexaCode());
    }
}