<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day13;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day13Command extends Command
{
    protected static $defaultName = 'day13';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToStringArray(__DIR__ . "/input.txt", PHP_EOL);

        $bus = new Bus();
        $part1 = $bus->part1((int)$puzzle_input[0], $puzzle_input[1]);
        $output->writeln("Part 1: " . $part1);

        $part2 = $bus->part2($puzzle_input[1]);
        $output->writeln("Part 2: " . $part2);

        return 0;
    }
}
