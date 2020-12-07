<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day7;

class Bags
{
    public function countPart1(array $bag_rules, string $start_color): int
    {
        $map = $this->buildMatrix($bag_rules);

        return count(array_filter($map, function (string $color) use ($start_color, $map) {
            return $this->canReach($start_color, $color, $map);
        }, ARRAY_FILTER_USE_KEY));
    }

    private function canReach(string $start_color, string $color, array $map): bool
    {
        if (empty($map[$color])) {
            return false;
        }
        if (isset($map[$color][$start_color])) {
            return true;
        }

        foreach ($map[$color] as $index => $_) {
            if ($this->canReach($start_color, $index, $map)) {
                return true;
            }
        }

        return false;
    }

    public function countPart2(array $bag_rules, string $start_color): int
    {
        $map = $this->buildMatrix($bag_rules);

        return $this->countBagsInBag($map, $start_color);
    }

    private function countBagsInBag(array $map, string $color): int
    {
        if (empty($map[$color])) {
            return 0;
        }

        $return = 0;
        foreach ($map[$color] as $index => $count) {
            $return += $count + ($count * $this->countBagsInBag($map, $index));
        }

        return $return;
    }

    private function buildMatrix(array $bag_rules): array
    {
        $map = [];
        foreach ($bag_rules as $bag_rule) {
            preg_match("/(.*) bags contain (.*)/", $bag_rule, $m1);
            [, $color, $contains] = $m1;

            if (!isset($map[$color])) {
                $map[$color] = [];
            }

            preg_match_all("/(\d+) (.*) bag/U", $contains, $m2, PREG_SET_ORDER);
            foreach ($m2 as $item) {
                [, $count, $other_color] = $item;
                $map[$color][$other_color] = (int)$count;
            }
        }

        return $map;
    }
}
