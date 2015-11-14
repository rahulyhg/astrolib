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

    /**
     * @dataProvider easterDateProvider
     */
    public function testEasterCalculation($year, $date)
    {
        $result = $this->time->calculateEaster($year);
        $this->assertEquals($date, $result->format('d/m'));
    }

    public function easterDateProvider()
    {
        return [
            [2000, '23/04'],
            [2015, '05/04'],
            [2010, '04/04'],
        ];
    }
}
