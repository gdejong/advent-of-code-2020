<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day10;

use PHPUnit\Framework\TestCase;

class JoltageTest extends TestCase
{
    public function testPart1(): void
    {
        $joltage = new Joltage();

        self::assertSame(7 * 5, $joltage->part1([16, 10, 15, 5, 1, 11, 7, 19, 6, 12, 4]));
        self::assertSame(22 * 10, $joltage->part1([28, 33, 18, 42, 31, 14, 46, 20, 48, 47, 24, 23, 49, 45, 19, 38, 39, 11, 1, 32, 25, 35, 8, 17, 7, 9, 4, 2, 34, 10, 3]));
    }

    public function testPart2(): void
    {
        $joltage = new Joltage();

        self::assertSame(8, $joltage->part2([16, 10, 15, 5, 1, 11, 7, 19, 6, 12, 4]));
        self::assertSame(19208, $joltage->part2([28, 33, 18, 42, 31, 14, 46, 20, 48, 47, 24, 23, 49, 45, 19, 38, 39, 11, 1, 32, 25, 35, 8, 17, 7, 9, 4, 2, 34, 10, 3]));
    }
}
