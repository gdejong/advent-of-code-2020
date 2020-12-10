<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day10;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day10Command extends Command
{
    protected static $defaultName = 'day10';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToIntArray(__DIR__ . "/input.txt", PHP_EOL);

        $joltage = new Joltage();

        $part1 = $joltage->part1($puzzle_input);
        $output->writeln("Part 1: " . $part1);

        $part2 = $joltage->part2($puzzle_input);
        $output->writeln("Part 2: " . $part2);

        return 0;
    }
}
