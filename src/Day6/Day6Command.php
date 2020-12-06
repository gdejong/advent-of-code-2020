<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day6;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day6Command extends Command
{
    protected static $defaultName = 'day6';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToStringArray(__DIR__ . "/input.txt", PHP_EOL . PHP_EOL);

        $customs = new Customs();
        $anyone = $customs->countAnyone($puzzle_input);
        $output->writeln("Part 1: " . $anyone);

        $everyone = $customs->countEveryone($puzzle_input);
        $output->writeln("Part 2: " . $everyone);

        return 0;
    }
}
