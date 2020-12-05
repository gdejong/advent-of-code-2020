<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day5;

use RuntimeException;

class Seat
{
    public function highestSeatNumber(array $seats): int
    {
        $highest = -1;
        foreach ($seats as $seat) {
            $id = $this->calculateSeatId($seat);
            if ($id > $highest) {
                $highest = $id;
            }
        }

        return $highest;
    }

    public function findMySeat(array $seats): int
    {
        $map = [];
        foreach ($seats as $seat) {
            $id = $this->calculateSeatId($seat);
            $map[$id] = $id;
        }

        ksort($map);

        foreach ($map as $x => $item) {
            if (!isset($map[$item + 1]) && isset($map[$item + 2])) {
                return $item + 1;
            }
        }

        throw new RuntimeException("Could not find seat number");
    }

    public function calculateSeatId(string $seat): int
    {
        if (strlen($seat) !== 10) {
            throw new RuntimeException("invalid input");
        }

        // Rows are the first 7 chars
        $rows = substr($seat, 0, 7);
        $row = $this->reduceToNumber($rows, 127, "B");

        // Columns are the last 3 chars
        $columns = substr($seat, 7);
        $column = $this->reduceToNumber($columns, 7, "R");

        return $row * 8 + $column;
    }

    private function reduceToNumber(string $seat, int $max_range, string $upper_char): int
    {
        $range = range(0, $max_range);
        while ($seat !== "") {
            $char = $seat[0];
            $upper = $char === $upper_char;

            $middle = ((count($range)) / 2) - 1;

            $range = array_filter($range, static function ($key) use ($middle, $upper) {
                if ($upper) {
                    return $key > $middle;
                }
                return $key <= $middle;
            }, ARRAY_FILTER_USE_KEY);

            $range = array_values($range); // reset keys
            $seat = substr($seat, 1); // remove first char from string
        }

        if (count($range) !== 1) {
            throw new RuntimeException("error");
        }

        return reset($range);
    }
}
