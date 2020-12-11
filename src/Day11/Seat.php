<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day11;

class Seat
{
    private const FLOOR = ".";
    private const EMPTY_SEAT = "L";
    private const OCCUPIED_SEAT = "#";

    public function run(array $all_seats, int $part): int
    {
        // Convert strings to arrays
        foreach ($all_seats as $index => $seats) {
            $all_seats[$index] = str_split($seats);
        }

        $stable = false;
        $finalSeating = "";
        while (!$stable) {
            $all_seats = match ($part) {
                1 => $this->switchSeatsPart1($all_seats),
                2 => $this->switchSeatsPart2($all_seats),
            };
            $currentSeating = $this->implodeSeats($all_seats);
            if ($finalSeating === $currentSeating) {
                $stable = true;
            }
            $finalSeating = $currentSeating;
        }

        return substr_count($finalSeating, self::OCCUPIED_SEAT);
    }

    private function implodeSeats(array $all_seats): string
    {
        $return = "";
        foreach ($all_seats as $seats) {
            $return .= implode("", $seats);
        }

        return $return;
    }

    private function switchSeatsPart2(array $all_seats): array
    {
        $new_seats = [];

        foreach ($all_seats as $y => $seats) {
            foreach ($seats as $x => $seat) {
                // Early out for floors
                if ($seat === self::FLOOR) {
                    $new_seats[$y][$x] = $seat;
                    continue;
                }

                $occupied = 0;
                foreach ([[0, -1], [-1, -1], [-1, 0], [-1, 1], [0, 1], [1, 1], [1, 0], [1, -1]] as $yx) {
                    [$extraY, $extraX] = $yx;
                    $tmpY = $y;
                    $tmpX = $x;
                    while (true) {
                        $tmpY += $extraY;
                        $tmpX += $extraX;
                        // Stop searching when going off the map
                        if (!isset($all_seats[$tmpY][$tmpX])) {
                            break;
                        }
                        // Stop searching when finding an empty seat
                        if ($all_seats[$tmpY][$tmpX] === self::EMPTY_SEAT) {
                            break;
                        }
                        // Found occupied seat!
                        if ($all_seats[$tmpY][$tmpX] === self::OCCUPIED_SEAT) {
                            $occupied++;
                            break;
                        }
                    }
                }

                if ($seat === self::EMPTY_SEAT && $occupied === 0) {
                    $new_seats[$y][$x] = self::OCCUPIED_SEAT;
                } elseif ($seat === self::OCCUPIED_SEAT && $occupied >= 5) {
                    $new_seats[$y][$x] = self::EMPTY_SEAT;
                } else {
                    $new_seats[$y][$x] = $seat;
                }
            }
        }
        return $new_seats;
    }

    private function switchSeatsPart1(array $all_seats): array
    {
        $new_seats = [];

        foreach ($all_seats as $y => $seats) {
            foreach ($seats as $x => $seat) {
                $occupied = 0;
                foreach ([[0, -1], [-1, -1], [-1, 0], [-1, 1], [0, 1], [1, 1], [1, 0], [1, -1]] as $yx) {
                    [$extraY, $extraX] = $yx;
                    if (isset($all_seats[$y + $extraY][$x + $extraX]) && $all_seats[$y + $extraY][$x + $extraX] === self::OCCUPIED_SEAT) {
                        $occupied++;
                    }
                }

                if ($seat === self::EMPTY_SEAT && $occupied === 0) {
                    $new_seats[$y][$x] = self::OCCUPIED_SEAT;
                } elseif ($seat === self::OCCUPIED_SEAT && $occupied >= 4) {
                    $new_seats[$y][$x] = self::EMPTY_SEAT;
                } else {
                    $new_seats[$y][$x] = $seat;
                }
            }
        }
        return $new_seats;
    }
}
