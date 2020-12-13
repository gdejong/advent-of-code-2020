<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day13;

use RuntimeException;

class Bus
{
    public function part1(int $earliest_departure, string $bus_times): int
    {
        $useful_bus_times = $this->parseBusTimes($bus_times);

        $earliest_bus_to_take = $earliest_departure;
        while (true) {
            foreach ($useful_bus_times as $useful_bus_time) {
                if ($earliest_bus_to_take % $useful_bus_time === 0) {
                    $bus_to_take = $useful_bus_time;
                    break 2;
                }
            }
            $earliest_bus_to_take++;
        }

        $wait_time = $earliest_bus_to_take - $earliest_departure;

        return $wait_time * $bus_to_take;
    }

    public function part2(string $bus_times): int
    {
        $useful_bus_times = $this->parseBusTimes($bus_times);
        $t = 0;
        $step = 1;
        foreach ($useful_bus_times as $index => $useful_bus_time) {
            while (true) {
                $x = $t + $index;
                if ($x % $useful_bus_time === 0) {
                    break;
                }
                // Add the step until we find a number that fits the current bus time
                $t += $step;
            }
            $step *= $useful_bus_time;
        }

        return $t;
    }

    private function parseBusTimes(string $bus_times): array
    {
        $useful_bus_times = [];
        foreach (explode(",", $bus_times) as $i => $time) {
            // Ignore x's
            if ($time === "x") {
                continue;
            }
            if (!is_numeric($time)) {
                throw new RuntimeException("$time is not a number");
            }
            $useful_bus_times[$i] = (int)$time;
        }

        return $useful_bus_times;
    }
}
