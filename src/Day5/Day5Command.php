<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day5;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day5Command extends Command
{
    protected static $defaultName = 'day5';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToStringArray(__DIR__ . "/input.txt", PHP_EOL);

        $seat = new Seat();
        $highest_id = $seat->highestSeatNumber($puzzle_input);
        $output->writeln("Part 1: " . $highest_id);

        $my_seat = $seat->findMySeat($puzzle_input);
        $output->writeln("Part 2: " . $my_seat);

        return 0;
    }
}
