<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day7;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day7Command extends Command
{
    protected static $defaultName = 'day7';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToStringArray(__DIR__ . "/input.txt", PHP_EOL);

        $bags = new Bags();
        $part1 = $bags->countPart1($puzzle_input, "shiny gold");
        $output->writeln("Part 1: " . $part1);

        $part2 = $bags->countPart2($puzzle_input, "shiny gold");
        $output->writeln("Part 2: " . $part2);

        return 0;
    }
}
