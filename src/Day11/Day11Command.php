<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day11;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day11Command extends Command
{
    protected static $defaultName = 'day11';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToStringArray(__DIR__ . "/input.txt", PHP_EOL);

        $seat = new Seat();
        $part1 = $seat->run($puzzle_input, 1);
        $output->writeln("Part 1: " . $part1);

        $part2 = $seat->run($puzzle_input, 2);
        $output->writeln("Part 2: " . $part2);

        return 0;
    }
}
