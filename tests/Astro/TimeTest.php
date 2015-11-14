<?php

use Astro\Time;

class TimeTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->time = new Time();
    }

    public function testEasterReturnDateTime()
    {
        $result = $this->time->calculateEaster(2000);
        $this->assertInstanceOf('\DateTime', $result);
    }

    public function testEasterCalculation()
    {
        $result = $this->time->calculateEaster(2000);
        $this->assertEquals('23/04', $result->format('d/m'));
    }
}
