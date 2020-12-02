<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day2;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day2Command extends Command
{
    protected static $defaultName = 'day2';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToStringArray(__DIR__ . "/input.txt");

        $password_tester = new PasswordTester();

        $valid = count(array_filter($puzzle_input, static function (string $input) use ($password_tester) {
            return $password_tester->isValid($input);
        }));
        $output->writeln("Part 1: " . $valid);

        $valid2 = count(array_filter($puzzle_input, static function (string $input) use ($password_tester) {
            return $password_tester->isValid2($input);
        }));
        $output->writeln("Part 2: " . $valid2);

        return 0;
    }
}
