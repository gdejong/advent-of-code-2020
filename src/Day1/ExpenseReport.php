<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day1;

use RuntimeException;

class ExpenseReport
{
    public function findMatchWithTwoNumbers(array $input, int $total): int
    {
        foreach ($input as $number1) {
            foreach ($input as $number2) {
                if ($number1 + $number2 === $total) {
                    return $number1 * $number2;
                }
            }
        }

        throw new RuntimeException("Could not find match");
    }

    public function findMatchWithThreeNumbers(array $input, int $total): int
    {
        foreach ($input as $number1) {
            foreach ($input as $number2) {
                foreach ($input as $number3) {
                    if ($number1 + $number2 + $number3 === $total) {
                        return $number1 * $number2 * $number3;
                    }
                }
            }
        }

        throw new RuntimeException("Could not find match");
    }
}
