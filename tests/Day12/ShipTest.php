<?php

namespace gdejong\AoC2020\Day12;

use PHPUnit\Framework\TestCase;

class ShipTest extends TestCase
{
    public function testShip(): void
    {
        $ship = new Ship();

        $input = [
            "F10",
            "N3",
            "F7",
            "R90",
            "F11",
        ];

        self::assertSame(25, $ship->part1($input));
        self::assertSame(286, $ship->part2($input));
    }
}
