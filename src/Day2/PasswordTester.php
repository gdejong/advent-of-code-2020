<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day2;

use RuntimeException;

class PasswordTester
{
    public function isValid(string $spec): bool
    {
        [$lowest, $highest, $letter, $password] = $this->splitSpec($spec);

        $actual_occurrences = substr_count($password, $letter);

        return $actual_occurrences >= $lowest && $actual_occurrences <= $highest;
    }

    public function isValid2(string $spec): bool
    {
        [$lowest, $highest, $letter, $password] = $this->splitSpec($spec);

        $first_letter = $password[$lowest - 1];
        $second_letter = $password[$highest - 1];

        if ($first_letter === $letter && $second_letter !== $letter) {
            return true;
        }

        if ($first_letter !== $letter && $second_letter === $letter) {
            return true;
        }

        return false;
    }

    private function splitSpec(string $spec): array
    {
        $result = preg_match("/(\d*)-(\d*)\s*(.*):\s*(.*)/", $spec, $m);
        if ($result === false) {
            throw new RuntimeException("Failed to parse spec " . $spec);
        }

        [, $lowest, $highest, $letter, $password] = $m;
        $lowest = (int)$lowest;
        $highest = (int)$highest;
        $letter = trim($letter);
        $password = trim($password);

        if ($lowest >= $highest) {
            $temp = $highest;
            $lowest = $highest;
            $highest = $temp;
        }

        return [$lowest, $highest, $letter, $password];
    }
}
