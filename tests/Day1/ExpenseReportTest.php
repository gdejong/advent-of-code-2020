<?php

namespace gdejong\AoC2020\Day1;

use PHPUnit\Framework\TestCase;

class ExpenseReportTest extends TestCase
{
    public function testFindMatchWithTwoNumbers(): void
    {
        $expense_report = new ExpenseReport();
        $result = $expense_report->findMatchWithTwoNumbers([1721, 979, 366, 299, 675, 1456], 2020);
        self::assertSame(514579, $result);
    }

    public function testFindMatchWithThreeNumbers(): void
    {
        $expense_report = new ExpenseReport();
        $result = $expense_report->findMatchWithThreeNumbers([1721, 979, 366, 299, 675, 1456], 2020);
        self::assertSame(241861950, $result);
    }
}
