<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day6;

use PHPUnit\Framework\TestCase;

class CustomsTest extends TestCase
{
    public function testCount(): void
    {
        $c = new Customs();

        $answers = [
            "abc",
            "a\nb\nc",
            "ab\nac",
            "a\na\na\na\n",
            "b",
        ];

        self::assertSame(11, $c->countAnyone($answers));
        self::assertSame(6, $c->countEveryone($answers));
    }
}
