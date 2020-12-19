<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day19;

use PHPUnit\Framework\TestCase;

class SatelliteMessageTest extends TestCase
{
    public function testPart1(): void
    {
        $input = <<<EOT
0: 4 1 5
1: 2 3 | 3 2
2: 4 4 | 5 5
3: 4 5 | 5 4
4: "a"
5: "b"

ababbb
bababa
abbbab
aaabbb
aaaabbb
EOT;
        $satellite_message = new SatelliteMessage();

        self::assertSame(2, $satellite_message->part1($input));
    }
}
