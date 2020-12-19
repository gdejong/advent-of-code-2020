<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day18;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day18Command extends Command
{
    protected static $defaultName = 'day18';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToStringArray(__DIR__ . "/input.txt", PHP_EOL);

        $math = new WeirdMath();

        $part1 = $math->solvePart1($puzzle_input);
        $output->writeln("Part 1: " . $part1);

        $part2 = $math->solvePart2($puzzle_input);
        $output->writeln("Part 2: " . $part2);

        return 0;
    }
}
