<?php

namespace gdejong\AoC2020\Day16;

use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase
{
    public function testPart1(): void
    {
        $ticket = new Ticket();

        $input = <<<EOT
class: 1-3 or 5-7
row: 6-11 or 33-44
seat: 13-40 or 45-50

your ticket:
7,1,14

nearby tickets:
7,3,47
40,4,50
55,2,20
38,6,12
EOT;

        self::assertSame(71, $ticket->part1($input));
    }
}
