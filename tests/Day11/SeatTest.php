<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day11;

use PHPUnit\Framework\TestCase;

class SeatTest extends TestCase
{
    public function testPart1(): void
    {
        $seat = new Seat();
        $seats = [
            "L.LL.LL.LL",
            "LLLLLLL.LL",
            "L.L.L..L..",
            "LLLL.LL.LL",
            "L.LL.LL.LL",
            "L.LLLLL.LL",
            "..L.L.....",
            "LLLLLLLLLL",
            "L.LLLLLL.L",
            "L.LLLLL.LL",
        ];
        self::assertSame(37, $seat->run($seats, 1));
        self::assertSame(26, $seat->run($seats, 2));
    }
}



