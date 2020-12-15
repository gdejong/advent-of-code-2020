<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day15;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day15Command extends Command
{
    protected static $defaultName = 'day15';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $memory = new Memory();
        $part1 = $memory->run([19, 20, 14, 0, 9, 1], 2020);
        $output->writeln("Part 1: " . $part1);

        $part2 = $memory->run([19, 20, 14, 0, 9, 1], 30000000);
        $output->writeln("Part 2: " . $part2);

        return 0;
    }
}
