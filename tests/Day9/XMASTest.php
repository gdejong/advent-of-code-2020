<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day9;

use PHPUnit\Framework\TestCase;

class XMASTest extends TestCase
{
    public function testPart1(): void
    {
        $numbers = [
            35,
            20,
            15,
            25,
            47,
            40,
            62,
            55,
            65,
            95,
            102,
            117,
            150,
            182,
            127,
            219,
            299,
            277,
            309,
            576,
        ];

        $xmas = new XMAS();

        self::assertSame(127, $xmas->part1($numbers, 5));
        self::assertSame(62, $xmas->part2($numbers, 5));
    }
}
