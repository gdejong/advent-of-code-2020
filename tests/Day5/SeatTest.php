<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day5;

use PHPUnit\Framework\TestCase;

class SeatTest extends TestCase
{
    public function testSeat(): void
    {
        $s = new Seat();

        self::assertSame(357, $s->calculateSeatId("FBFBBFFRLR"));
        self::assertSame(567, $s->calculateSeatId("BFFFBBFRRR"));
        self::assertSame(119, $s->calculateSeatId("FFFBBBFRRR"));
        self::assertSame(820, $s->calculateSeatId("BBFFBBFRLL"));
    }
}
