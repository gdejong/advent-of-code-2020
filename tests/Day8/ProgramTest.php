<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day8;

use PHPUnit\Framework\TestCase;

class ProgramTest extends TestCase
{
    public function testProgram(): void
    {
        $program = new Program();

        $instructions = [
            "nop +0",
            "acc +1",
            "jmp +4",
            "acc +3",
            "jmp -3",
            "acc -99",
            "acc +1",
            "jmp -4",
            "acc +6",
        ];

        self::assertSame(5, $program->part1($instructions));
        self::assertSame(8, $program->part2($instructions));
    }
}
