<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day19;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day19Command extends Command
{
    protected static $defaultName = 'day19';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = file_get_contents(__DIR__ . "/input.txt");

        $satellite_message = new SatelliteMessage();
        $part1 = $satellite_message->part1($puzzle_input);
        $output->writeln("Part 1: " . $part1);

//        $math = new WeirdMath();
//
//        $part1 = $math->solvePart1($puzzle_input);
//        $output->writeln("Part 1: " . $part1);
//
//        $part2 = $math->solvePart2($puzzle_input);
//        $output->writeln("Part 2: " . $part2);

        return 0;
    }
}
