<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day6;

class Customs
{
    public function countAnyone(array $group_answers): int
    {
        $total = 0;

        foreach ($group_answers as $group_answer) {
            $map = [];
            foreach (explode(PHP_EOL, trim($group_answer)) as $answer) {
                foreach (str_split($answer) as $char) {
                    $map[$char] = 1;
                }
            }

            $total += count($map);
        }

        return $total;
    }

    public function countEveryone(array $group_answers): int
    {
        $total = 0;

        foreach ($group_answers as $group_answer) {
            $maps = [];

            foreach (explode(PHP_EOL, trim($group_answer)) as $answer) {
                $map = [];
                foreach (str_split($answer) as $char) {
                    $map[$char] = $char;
                }
                $maps[] = $map;

            }

            $total += count(array_intersect(...$maps));
        }

        return $total;
    }
}