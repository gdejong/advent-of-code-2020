<?php

namespace gdejong\AoC2020\Day13;

use PHPUnit\Framework\TestCase;

class BusTest extends TestCase
{
    public function testBusPart1(): void
    {
        $bus = new Bus();

        self::assertSame(295, $bus->part1(939, "7,13,x,x,59,x,31,19"));
    }


    public function providerPart2(): array
    {
        return [
            ["7,13,x,x,59,x,31,19", 1068781],
//            ["17,x,13,19", 3417],
//            ["67,7,59,61", 754018],
//            ["67,x,7,59,61", 779210],
//            ["67,7,x,59,61", 1261476],
//            ["1789,37,47,1889", 1202161486],
        ];
    }

    /**
     * @dataProvider providerPart2
     */
    public function testBusPart2(string $in, int $expected): void
    {
        $bus = new Bus();

        self::assertSame($expected, $bus->part2($in));
    }
}
