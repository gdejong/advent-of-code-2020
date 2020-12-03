<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day3;

use PHPUnit\Framework\TestCase;

class TreeMapTest extends TestCase
{
    public function testCountTreesForSlope(): void
    {
        $tree_map = new TreeMap();

        $map = [
            "..##.......",
            "#...#...#..",
            ".#....#..#.",
            "..#.#...#.#",
            ".#...##..#.",
            "..#.##.....",
            ".#.#.#....#",
            ".#........#",
            "#.##...#...",
            "#...##....#",
            ".#..#...#.#",
        ];

        self::assertSame(7, $tree_map->countTreesForSlope($map, 3, 1));
    }

    public function testCountTreesForSlopes(): void
    {
        $tree_map = new TreeMap();

        $map = [
            "..##.......",
            "#...#...#..",
            ".#....#..#.",
            "..#.#...#.#",
            ".#...##..#.",
            "..#.##.....",
            ".#.#.#....#",
            ".#........#",
            "#.##...#...",
            "#...##....#",
            ".#..#...#.#",
        ];

        $slopes = [
            [1, 1],
            [3, 1],
            [5, 1],
            [7, 1],
            [1, 2],
        ];

        self::assertSame(336, $tree_map->countTreesForSlopes($map, $slopes));
    }
}
