<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day14;

use RuntimeException;

class FerryComputer
{
    public function part1(array $program): int
    {
        $memory = [];
        $current_mask = "";

        foreach ($program as $line) {
            if (str_starts_with($line, "mask")) {
                $current_mask = trim(explode("=", $line)[1]);
                continue;
            }

            // Match "mem[8] = 11"
            preg_match("/mem\[(\d+)\]\s+=\s+(\d+)/", $line, $m);
            $memory_location = (int)$m[1];
            $value = (int)$m[2];

            $value_as_string = str_pad(decbin($value), 36, "0", STR_PAD_LEFT);

            foreach (str_split($current_mask) as $index => $item) {
                if ($item === "X") {
                    continue;
                }
                $bit = (int)$item;
                if ($bit === 0) {
                    $value_as_string[$index] = "0";
                } else {
                    $value_as_string[$index] = "1";
                }
            }

            $memory[$memory_location] = bindec($value_as_string);
        }

        return array_sum($memory);
    }

    public function part2(array $program): int
    {
        $memory = [];
        $current_mask = "";

        foreach ($program as $line) {
            if (str_starts_with($line, "mask")) {
                $current_mask = trim(explode("=", $line)[1]);
                continue;
            }

            // Match "mem[8] = 11"
            preg_match("/mem\[(\d+)\]\s+=\s+(\d+)/", $line, $m);
            $memory_location = (int)$m[1];
            $value = (int)$m[2];

            $memory_location_string = str_pad(decbin($memory_location), 36, "0", STR_PAD_LEFT);

            $x_positions = [];
            foreach (str_split($current_mask) as $index => $item) {
                switch ($item) {
                    case 0:
                        // If the bitmask bit is 0, the corresponding memory address bit is unchanged.
                        break;
                    case 1:
                        // If the bitmask bit is 1, the corresponding memory address bit is overwritten with 1.
                        $memory_location_string[$index] = "1";
                        break;
                    case "X":
                        // If the bitmask bit is X, the corresponding memory address bit is floating.
                        $x_positions[] = $index;
                        $memory_location_string[$index] = "X";
                        break;
                    default:
                        throw new RuntimeException("error");
                }
            }

            $length = count($x_positions);
            $max = 1 << $length;
            for ($i = 0; $i < $max; $i++) {
                $short_mask = str_pad(decbin($i), $length, "0", STR_PAD_LEFT); // E.g. 011

                foreach ($x_positions as $index => $x_position) {
                    $memory_location_string[$x_position] = $short_mask[$index];
                }
                $memory[bindec($memory_location_string)] = $value;
            }
        }

        return array_sum($memory);
    }
}
