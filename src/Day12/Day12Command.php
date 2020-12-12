<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day12;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day12Command extends Command
{
    protected static $defaultName = 'day12';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToStringArray(__DIR__ . "/input.txt", PHP_EOL);

        $ship = new Ship();
        $part1 = $ship->part1($puzzle_input);
        $output->writeln("Part 1: " . $part1);

        $part2 = $ship->part2($puzzle_input);
        $output->writeln("Part 2: " . $part2);

        return 0;
    }
}
