<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day3;

class TreeMap
{
    private const TREE = "#";

    public function countTreesForSlope(array $map, int $right, int $down): int
    {
        $x = 0;
        $y = 0;

        $number_of_trees = 0;

        $map_height = count($map);
        while ($y < $map_height) {
            // Grow
            if (!isset($map[$y][$x])) {
                foreach ($map as $index => $row) {
                    $map[$index] = $row . $row;
                }
            }
            $tree_or_no_tree = $map[$y][$x] === self::TREE;
            if ($tree_or_no_tree) {
                $number_of_trees++;
            }

            $x += $right;
            $y += $down;
        }

        return $number_of_trees;
    }

    public function countTreesForSlopes(array $map, array $slopes): int
    {
        $trees = [];

        foreach ($slopes as $slope) {
            [$right, $down] = $slope;
            $trees[] = $this->countTreesForSlope($map, $right, $down);
        }

        return array_product($trees);
    }
}
