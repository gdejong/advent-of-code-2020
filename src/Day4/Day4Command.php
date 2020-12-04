<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day4;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day4Command extends Command
{
    protected static $defaultName = 'day4';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToStringArray(__DIR__ . "/input.txt", PHP_EOL . PHP_EOL);

        $passport = new Passport();
        $count = $passport->countValid($puzzle_input);
        $output->writeln("Part 1: " . $count);

        $count2 = $passport->countValidPart2($puzzle_input);
        $output->writeln("Part 2: " . $count2);

        return 0;
    }
}
