<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day10;

use RuntimeException;

class Joltage
{
    public function part1(array $input): int
    {
        $input[] = 0; // add charging outlet effective rating
        $input[] = max($input) + 3; // add built-in joltage adapter

        sort($input);
        $count = count($input);

        $one_jolt_diffs = 0;
        $three_jolt_diffs = 0;
        foreach ($input as $index => $joltage) {
            // Skip checking last item
            if ($index + 1 === $count) {
                break;
            }

            $diff = $input[$index + 1] - $joltage;
            if ($diff === 1) {
                $one_jolt_diffs++;
            } elseif ($diff === 3) {
                $three_jolt_diffs++;
            } else {
                throw new RuntimeException("Unexpected diff $diff");
            }
        }

        return $one_jolt_diffs * $three_jolt_diffs;
    }

    /**
     * With help from https://www.reddit.com/r/adventofcode/comments/kacdbl/2020_day_10c_part_2_no_clue_how_to_begin
     */
    public function part2(array $input): int
    {
        $input[] = 0; // add charging outlet effective rating
        $input[] = max($input) + 3; // add built-in joltage adapter
        sort($input);

        $seen = [];
        $seen[0] = 1;
        foreach ($input as $joltage) {
            $candidates = array_filter($input, static function ($value) use ($joltage) {
                if ($value <= $joltage) {
                    return false;
                }
                if ($joltage + 3 < $value) {
                    return false;
                }

                return true;
            });

            foreach ($candidates as $candidate) {
                if (!isset($seen[$joltage])) {
                    $seen[$joltage] = 0;
                }
                if (!isset($seen[$candidate])) {
                    $seen[$candidate] = 0;
                }

                $add = $seen[$joltage];
                $seen[$candidate] += $add;
            }
        }

        return end($seen);
    }
}
