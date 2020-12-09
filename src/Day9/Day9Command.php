<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day9;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day9Command extends Command
{
    protected static $defaultName = 'day9';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToIntArray(__DIR__ . "/input.txt", PHP_EOL);

        $xmas = new XMAS();
        $part1 = $xmas->part1($puzzle_input, 25);
        $output->writeln("Part 1: " . $part1);

        $part2 = $xmas->part2($puzzle_input, 25);
        $output->writeln("Part 2: " . $part2);
        return 0;
    }
}
