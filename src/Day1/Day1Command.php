<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day1;

use gdejong\AoC2020\Utils\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Day1Command extends Command
{
    protected static $defaultName = 'day1';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $puzzle_input = File::convertFileToIntArray(__DIR__ . "/input.txt");

        $expense_report = new ExpenseReport();
        $result_part1 = $expense_report->findMatchWithTwoNumbers($puzzle_input, 2020);
        $output->writeln("Part 1: " . $result_part1);

        $result_part2 = $expense_report->findMatchWithThreeNumbers($puzzle_input, 2020);
        $output->writeln("Part 2: " . $result_part2);

        return 0;
    }
}
