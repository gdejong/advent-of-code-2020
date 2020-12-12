<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day12;

use RuntimeException;

class Ship
{
    private const EAST = 0;
    private const SOUTH = 1;
    private const WEST = 2;
    private const NORTH = 3;

    public function part1(array $input): int
    {
        $actions = $this->parseInstructions($input);

        $direction = self::EAST;
        $x = $y = 0;

        foreach ($actions as $action) {
            [$action, $value] = $action;
            switch ($action) {
                case "F":
                    switch ($direction) {
                        case self::EAST:
                            $x += $value;
                            break;
                        case self::WEST:
                            $x -= $value;
                            break;
                        case self::SOUTH:
                            $y -= $value;
                            break;
                        case self::NORTH:
                            $y += $value;
                            break;
                        default:
                            throw new RuntimeException("unimplemented direction $direction");
                    }
                    break;

                case "N":
                    $y += $value;
                    break;
                case "E":
                    $x += $value;
                    break;
                case "S":
                    $y -= $value;
                    break;
                case "W":
                    $x -= $value;
                    break;
                case "R":
                    $direction += ($value / 90);
                    if ($direction < 0) {
                        $direction += 4;
                    }
                    $direction %= 4;
                    break;
                case "L":
                    $direction -= ($value / 90);
                    if ($direction < 0) {
                        $direction += 4;
                    }
                    $direction %= 4;
                    break;
                default:
                    throw new RuntimeException("unimplemented action $action");
            }
        }

        return abs($x) + abs($y);
    }

    public function part2(array $input): int
    {
        $actions = $this->parseInstructions($input);
        $shipX = $shipY = 0;
        $relativeWaypointX = 10;
        $relativeWaypointY = 1;

        foreach ($actions as $action) {
            [$action, $value] = $action;
            switch ($action) {
                case "F":
                    $shipX += ($value * $relativeWaypointX);
                    $shipY += ($value * $relativeWaypointY);
                    break;
                case "R":
                    for ($i = 0; $i < ($value / 90); $i++) {
                        $tmpY = $relativeWaypointY;
                        $relativeWaypointY = -$relativeWaypointX;
                        $relativeWaypointX = $tmpY;
                    }
                    break;
                case "L":
                    for ($i = 0; $i < ($value / 90); $i++) {
                        $tmpX = $relativeWaypointX;
                        $relativeWaypointX = -$relativeWaypointY;
                        $relativeWaypointY = $tmpX;
                    }
                    break;
                case "N":
                    $relativeWaypointY += $value;
                    break;
                case "E":
                    $relativeWaypointX += $value;
                    break;
                case "S":
                    $relativeWaypointY -= $value;
                    break;
                case "W":
                    $relativeWaypointX -= $value;
                    break;
                default:
                    throw new RuntimeException("unimplemented action $action");
            }
        }

        return abs($shipX) + abs($shipY);
    }

    private function parseInstructions(array $input): array
    {
        $return = [];

        foreach ($input as $item) {
            $action = $item[0];
            if (!in_array($action, ["N", "S", "E", "W", "L", "R", "F"], true)) {
                throw new RuntimeException("invalid action $action");
            }
            $value = (int)substr($item, 1);
            $return[] = [$action, $value];
        }

        return $return;
    }
}
