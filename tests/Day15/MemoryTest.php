<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day15;

use PHPUnit\Framework\TestCase;

class MemoryTest extends TestCase
{
    public function testPart1(): void
    {
        $memory = new Memory();

        self::assertSame(436, $memory->run([0, 3, 6], 2020));
        self::assertSame(1, $memory->run([1, 3, 2], 2020));
        self::assertSame(27, $memory->run([1, 2, 3], 2020));
        self::assertSame(78, $memory->run([2, 3, 1], 2020));
        self::assertSame(438, $memory->run([3, 2, 1], 2020));
        self::assertSame(1836, $memory->run([3, 1, 2], 2020));
    }

    public function testPart2(): void
    {
        $memory = new Memory();

        self::assertSame(175594, $memory->run([0, 3, 6], 30000000));
    }
}
