<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Utils;

use UnexpectedValueException;

class File
{
    public static function convertFileToIntArray(string $filename, string $delimiter = PHP_EOL): array
    {
        $strings = self::convertFileToStringArray($filename, $delimiter);

        $output = [];
        foreach ($strings as $line) {
            if (!is_numeric($line)) {
                throw new UnexpectedValueException("Value " . var_export($line, true) . " is not numeric");
            }
            $output[] = (int)$line;
        }

        return $output;
    }

    public static function convertFileToStringArray(string $filename, string $delimiter = PHP_EOL): array
    {
        $input = self::getFileContents($filename);

        return explode($delimiter, $input);
    }

    public static function getFileContents(string $filename): string
    {
        $input = trim(file_get_contents($filename), "\n" . PHP_EOL);
        if ($input === false) {
            die("Failed to open input file: " . $filename);
        }

        return $input;
    }
}
