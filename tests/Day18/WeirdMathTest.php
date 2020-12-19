<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day18;

use PHPUnit\Framework\TestCase;

class WeirdMathTest extends TestCase
{
    public function testSolve(): void
    {
        $math = new WeirdMath();

        self::assertSame(71, $math->solvePart1(["1 + 2 * 3 + 4 * 5 + 6"]));
        self::assertSame(51, $math->solvePart1(["1 + (2 * 3) + (4 * (5 + 6))"]));
        self::assertSame(26, $math->solvePart1(["2 * 3 + (4 * 5)"]));
        self::assertSame(12240, $math->solvePart1(["5 * 9 * (7 * 3 * 3 + 9 * 3 + (8 + 6 * 4))"]));
        self::assertSame(13632, $math->solvePart1(["((2 + 4 * 9) * (6 + 9 * 8 + 6) + 6) + 2 + 4 * 2"]));


        self::assertSame(231, $math->solvePart2(["1 + 2 * 3 + 4 * 5 + 6"]));
        self::assertSame(51, $math->solvePart2(["1 + (2 * 3) + (4 * (5 + 6))"]));
        self::assertSame(46, $math->solvePart2(["2 * 3 + (4 * 5)"]));
        self::assertSame(669060, $math->solvePart2(["5 * 9 * (7 * 3 * 3 + 9 * 3 + (8 + 6 * 4))"]));
        self::assertSame(23340, $math->solvePart2(["((2 + 4 * 9) * (6 + 9 * 8 + 6) + 6) + 2 + 4 * 2"]));
    }
}
