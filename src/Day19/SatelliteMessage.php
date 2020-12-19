<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day19;


class SatelliteMessage
{
    public function part1(string $input): int
    {
        $rules = [];
        $test_strings = [];

        foreach (explode(PHP_EOL, $input) as $item) {
            if (trim($item) === "") {
                continue;
            }
            if (!str_contains($item, ":")) {
                $test_strings[] = $item;
                continue;
            }

            // Match "1: 2 3 | 3 2"
            $parts = explode(":", $item);

            $rule = $parts[1];
            $rule = str_replace("\"", "", $rule);
            $rule = trim($rule);
            $rules[(int)$parts[0]] = $rule;
        }

        $built_regexes = [];
        while (count($built_regexes) !== count($rules)) {
            foreach ($rules as $n => $rule) {
                if (isset($built_regexes[$n])) {
                    continue;
                }
                $parts = explode(" ", $rule);
                $can_build_regex_for_rule = true;
                foreach ($parts as $part) {
                    if (!is_numeric($part)) {
                        continue;
                    }
                    if (!isset($built_regexes[(int)$part])) {
                        $can_build_regex_for_rule = false;
                        break;
                    }
                }
                if ($can_build_regex_for_rule) {
                    // If the rule is just "a" it becomes the regex for that rule.
                    if (strlen($rule) === 1) {
                        $built_regexes[$n] = $rule;
                    } elseif (str_contains($rule, "|")) {
                        // If there is a pipe in the rule (like "4 4 | 5 5") we create a non-capturing group with an OR in it.
                        // Two cases:
                        // - "4 4 | 5 5"
                        // - "39 | 110"
                        [$front, $end] = explode("|", $rule);
                        $front = trim($front);
                        $end = trim($end);

                        // First case
                        if (str_contains($front, " ")) {
                            [$front_front, $front_end] = explode(" ", $front);
                            [$end_front, $end_end] = explode(" ", $end);

                            $built_regexes[$n] = sprintf("(?:%s%s|%s%s)",
                                $built_regexes[(int)$front_front],
                                $built_regexes[(int)$front_end],
                                $built_regexes[(int)$end_front],
                                $built_regexes[(int)$end_end],
                            );
                        } else {
                            // Second case
                            $built_regexes[$n] = sprintf("(?:%s|%s)",
                                $built_regexes[(int)$front],
                                $built_regexes[(int)$end],
                            );
                        }
                    } else {
                        // The rule does not contain a pipe (like "4 1 5"), take all pre-built regexes for these rules and append them.
                        $r = "";
                        foreach (explode(" ", $rule) as $item) {
                            $r .= $built_regexes[$item];
                        }
                        $built_regexes[$n] = $r;
                    }
                }
            }
        }

        // Now take the regex for rule 0 and add start of line and end of line delimiters (^ and $).
        $regex = "/^" . $built_regexes[0] . "$/";

        $valid = 0;
        foreach ($test_strings as $test_string) {
            if (preg_match($regex, $test_string)) {
                $valid++;
            }
        }

        return $valid;
    }
}
