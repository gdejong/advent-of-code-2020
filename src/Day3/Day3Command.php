<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day3;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day3Command extends Command
{
    protected static $defaultName = 'day3';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToStringArray(__DIR__ . "/input.txt");

        $tree_map = new TreeMap();
        $number_of_trees = $tree_map->countTreesForSlope($puzzle_input, 3, 1);
        $output->writeln("Part 1: " . $number_of_trees);

        $slopes = [
            [1, 1],
            [3, 1],
            [5, 1],
            [7, 1],
            [1, 2],
        ];
        $number_of_trees_part2 = $tree_map->countTreesForSlopes($puzzle_input, $slopes);
        $output->writeln("Part 2: " . $number_of_trees_part2);

        return 0;
    }
}
