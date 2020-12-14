<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day14;

use PHPUnit\Framework\TestCase;

class FerryComputerTest extends TestCase
{
    public function testPart1(): void
    {
        $program = [
            "mask = XXXXXXXXXXXXXXXXXXXXXXXXXXXXX1XXXX0X",
            "mem[8] = 11",
            "mem[7] = 101",
            "mem[8] = 0",
        ];

        $computer = new FerryComputer();

        self::assertSame(165, $computer->part1($program));
    }

    public function testPart2(): void
    {
        $program = [
            "mask = 000000000000000000000000000000X1001X",
            "mem[42] = 100",
            "mask = 00000000000000000000000000000000X0XX",
            "mem[26] = 1",
        ];

        $computer = new FerryComputer();

        self::assertSame(208, $computer->part2($program));
    }
}
