<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day4;

use RuntimeException;

class Passport
{
    public function countValid(array $passport_list): int
    {
        return count(array_filter($passport_list, function (string $passport) {
            return $this->validate($passport);
        }));
    }

    private function validate(string $passport): bool
    {
        $required_fields = ["byr", "iyr", "eyr", "hgt", "hcl", "ecl", "pid"]; // no cid

        foreach ($required_fields as $required_field) {
            if (!str_contains($passport, $required_field . ":")) {
                return false;
            }
        }

        return true;
    }

    public function countValidPart2(array $passport_list): int
    {
        return count(array_filter($passport_list, function (string $passport) {
            return $this->validatePart2($passport);
        }));
    }

    private function validatePart2(string $passport): bool
    {
        // Check for all required fields
        if (!$this->validate($passport)) {
            return false;
        }

        $x = preg_match_all("/(\w{3}):(\S+)/", $passport, $matches, PREG_SET_ORDER);
        if ($x === false) {
            throw new RuntimeException("Failed to parse passport");
        }

        foreach ($matches as $passport_item) {
            [, $field, $value] = $passport_item;

            if (!match ($field) {
                "byr" => self::validateByr($value),
                "iyr" => self::validateIyr($value),
                "eyr" => self::validateEyr($value),
                "hgt" => self::validateHgt($value),
                "hcl" => self::validateHcl($value),
                "ecl" => self::validateEcl($value),
                "pid" => self::validatePid($value),
                "cid" => true,
            }) {
                return false;
            }
        }

        return true;
    }

    public static function validatePid(string $value): bool
    {
        return preg_match("/^[\d]{9}$/", $value) === 1;
    }

    public static function validateEcl(string $value): bool
    {
        return in_array($value, ["amb", "blu", "brn", "gry", "grn", "hzl", "oth"], true);
    }

    public static function validateHcl(string $value): bool
    {
        return preg_match("/^#[a-f0-9]{6}$/", $value) === 1;
    }

    public static function validateEyr(string $value): bool
    {
        return ($value >= 2020 && $value <= 2030);
    }

    public static function validateIyr(string $value): bool
    {
        return ($value >= 2010 && $value <= 2020);
    }

    public static function validateByr(string $value): bool
    {
        return ($value >= 1920 && $value <= 2002);
    }

    public static function validateHgt(string $value): bool
    {
        if (str_ends_with($value, "cm")) {
            $num = (int)$value;
            return $num >= 150 && $num <= 193;
        }

        if (str_ends_with($value, "in")) {
            $num = (int)$value;
            return $num >= 59 && $num <= 76;
        }

        return false;
    }
}
