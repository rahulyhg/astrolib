<?php

use Astro\Time;

class TimeTest extends \PHPUnit_Framework_TestCase
{
    public function testEasterReturnDateTime()
    {
        $time = new Time(\DateTime::createFromFormat('Y', 2000));
        $result = $time->calculateEaster();
        $this->assertInstanceOf('\DateTime', $result);
    }

    /**
     * @dataProvider easterDateProvider
     */
    public function testEasterCalculation($year, $date)
    {
        $time = new Time(\DateTime::createFromFormat('Y', $year));
        $result = $time->calculateEaster();
        $this->assertEquals($date, $result->format('d/m'));
    }

    public function testCalculateDaysFromPeriodReturnsInteger()
    {
        $time = new Time(new \DateTime());
        $result = $time->daysTo(new \DateTime('17 February'));
        $this->assertInternalType('integer', $result);
    }

    /**
     * @dataProvider daysToProvider
     */
    public function testCalculateDaysFromPeriod()
    {
        $time = new Time(new \DateTime('1 January'));
        $result = $time->daysTo(new \DateTime('17 February'));
        $this->assertEquals(48, $result);
    }

    public function testCalculateNumberOfHoursReturnFloat()
    {
        $time = new Time(new \DateTime('6 hours 31 minutes 27 seconds'));
        $result = $time->numberOfHours();
        $this->assertInternalType('float', $result);
    }

    /**
     * @dataProvider numberOfHoursProvider
     */
    public function testCalculateNumberOfHours($timeString, $expected)
    {
        $time = new Time(new \DateTime($timeString));
        $result = $time->numberOfHours();
        $this->assertEquals($expected, $result, '', 0.00002);
    }
    
    public function numberOfHoursProvider()
    {
        return [
            ['18:31:27', 18.52417],
            ['04:31:27', 4.52417],
            ['11:11:11', 11.18638],
        ];
    }

    public function easterDateProvider()
    {
        return [
            [2000, '23/04'],
            [2015, '05/04'],
            [2010, '04/04'],
        ];
    }

    public function daysToProvider()
    {
        return [
            ['1 January', '17 February', 48],
            ['1 January 2000', '17 February 2000', 48],
            ['1 January 1980', '17 February 1985', 1875],
        ];
    }
}
