<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day16;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day16Command extends Command
{
    protected static $defaultName = 'day16';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = file_get_contents(__DIR__ . "/input.txt");

        $ticket = new Ticket();

        $part1 = $ticket->part1($puzzle_input);
        $output->writeln("Part 1: " . $part1);

        $part2 = $ticket->part2($puzzle_input);
        $output->writeln("Part 2: " . $part2);

        return 0;
    }
}
