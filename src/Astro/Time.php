<?php

namespace Astro;

class Time
{
    /**
     * Calculates easter for year
     *
     * @var int $year Number of year for easter date
     */
    public function calculateEaster($year)
    {
        $a = $year % 19;
        $b = (int) ($year / 100);
        $c = $year % 100;
        $d = (int) ($b / 4);
        $e = $b % 4;
        $f = (int) (($b + 8) / 25);
        $g = (int) (($b - $f + 1) / 3);
        $h = (19 * $a + $b - $d - $g + 15) % 30;
        $i = (int) ($c / 4);
        $k = $c % 4;
        $l = (32 + 2 * $e + 2 * $i - $h - $k) % 7;
        $m = (int) (($a + 11 * $h + 22 * $l) / 451);
        $n = (int) (($h + $l - 7 * $m + 114) / 31);
        $p = ($h + $l - 7 * $m + 114) % 31;

        $dateString = sprintf(
            '%d-%d-%d',
            $p + 1,
            $n,
            $year
        );

        return \DateTime::createFromFormat('d-m-Y', $dateString);
    }
}
