<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day9;

use RuntimeException;

class XMAS
{
    public function part1(array $numbers, int $preamble_length): int
    {
        $rest = array_slice($numbers, $preamble_length);

        foreach ($rest as $i => $num) {
            $preamble = array_slice($numbers, $i, $preamble_length);
            $ok = false;
            foreach ($preamble as $a) {
                foreach ($preamble as $b) {
                    if ($a + $b === $num) {
                        $ok = true;
                        continue 2;
                    }
                }
            }
            if (!$ok) {
                return $num;
            }
        }

        throw new RuntimeException("failed");
    }

    public function part2(array $numbers, int $preamble_length): int
    {
        $invalid_number = $this->part1($numbers, $preamble_length);

        $count = count($numbers);
        foreach ($numbers as $index => $a) {
            $sum = 0;
            $seen = [];
            for ($i = $index; $i < $count; $i++) {
                $sum += $numbers[$i];
                $seen[] = $numbers[$i];
                if ($sum === $invalid_number) {
                    return min($seen) + max($seen);
                }
                if ($sum > $invalid_number) {
                    break;
                }
            }
        }

        throw new RuntimeException("failed");
    }
}
