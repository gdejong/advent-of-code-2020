<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day16;

use RuntimeException;

class Ticket
{
    public function part1(string $input): int
    {
        $valid_ranges = $this->parseFields($input);
        $nearby_tickets_as_number = $this->parseInputForAllNearlyTicketNumbers($input);

        $invalid = [];
        foreach ($nearby_tickets_as_number as $nearby_ticket_array) {
            foreach ($nearby_ticket_array as $number) {
                if (!$this->isValid($valid_ranges, $number)) {
                    $invalid[] = $number;
                }
            }
        }

        return array_sum($invalid);
    }

    public function part2(string $input): int
    {
        $valid_ranges = $this->parseFields($input);
        $nearby_tickets_as_number = $this->parseInputForAllNearlyTicketNumbers($input);

        // Start by discarding invalid tickets
        $valid_tickets = [];
        foreach ($nearby_tickets_as_number as $nearby_ticket_array) {
            $is_ok = true;
            foreach ($nearby_ticket_array as $number) {
                if (!$this->isValid($valid_ranges, $number)) {
                    $is_ok = false;
                    break;
                }
            }
            if ($is_ok) {
                $valid_tickets[] = $nearby_ticket_array;
            }
        }

        // Now determine the order of the fields
        $findings = [];
        foreach ($valid_tickets as $valid_ticket_array) {
            foreach ($valid_ticket_array as $position => $valid_ticket_number) {
                foreach ($valid_ranges as $name => $valid_range) {
                    if ($this->isValid([$valid_range], $valid_ticket_number)) {
                        $findings[$name][$position][] = $valid_ticket_number;
                    }
                }
            }
        }

        $positions = count(reset($valid_tickets));

        $possibilities = [];
        foreach ($valid_ranges as $name => $valid_range) {
            for ($i = 0; $i < $positions; $i++) {
                $search = array_column($valid_tickets, $i);
                $found = true;
                foreach ($search as $s) {
                    if (!in_array($s, $findings[$name][$i], true)) {
                        $found = false;
                    }
                }
                if ($found) {
                    $possibilities[$name][] = $i;
                }
            }
        }

        // Sort the possibilities by their count, there is a nice pattern where there is exactly 1 array with 1 item,
        // 1 array with exactly 2 items, 1 array with 3 items etc.
        uasort($possibilities, static function ($a, $b) {
            return count($a) - count($b);
        });

        $final = [];
        $positions_checked = [];
        foreach ($possibilities as $field_name => $possibility) {
            foreach ($positions_checked as $position_checked) {
                $key = array_search($position_checked, $possibility, true);
                unset($possibility[$key]);
            }
            if (count($possibility) !== 1) {
                throw new RuntimeException("error");
            }
            $pos = reset($possibility);
            $final[$field_name] = $pos;
            $positions_checked[] = $pos;
        }

        $my_ticket = $this->getMyTicket($input);

        // Now just multiple the six values that start with "departure"
        $return = [];
        foreach ($final as $field_name => $position) {
            if (str_starts_with($field_name, "departure")) {
                $return[] = $my_ticket[$position];
            }
        }

        return array_product($return);
    }

    private function isValid(array $valid_ranges, int $nearby_ticket): bool
    {
        foreach ($valid_ranges as $valid_range) {
            [$lower1, $upper1, $lower2, $upper2] = $valid_range;

            if ($nearby_ticket >= $lower1 && $nearby_ticket <= $upper1) {
                return true;
            }
            if ($nearby_ticket >= $lower2 && $nearby_ticket <= $upper2) {
                return true;
            }
        }
        return false;
    }

    private function getMyTicket(string $input): array
    {
        preg_match("/your ticket:\n(.*)/", $input, $m);

        $ticket_string = $m[1];

        return explode(",", $ticket_string);
    }

    private function parseInputForAllNearlyTicketNumbers(string $input): array
    {
        // Match everything after "nearby tickets:"
        preg_match("/nearby tickets:(.*)/s", $input, $m2);

        $nearby_tickets = [];
        foreach (explode("\n", trim($m2[1])) as $nearby_ticket_string) {
            $nearby_ticket = [];
            foreach (explode(",", $nearby_ticket_string) as $item) {
                $nearby_ticket[] = (int)$item;
            }
            $nearby_tickets[] = $nearby_ticket;
        }

        return $nearby_tickets;
    }

    private function parseFields(string $input): array
    {
        // Match "class: 1-3 or 5-7"
        preg_match_all("/([a-z ]+): (\d+)-(\d+) or (\d+)-(\d+)/", $input, $m, PREG_SET_ORDER);

        $valid_ranges = [];
        foreach ($m as $match) {
            $valid_ranges[$match[1]] = [(int)$match[2], (int)$match[3], (int)$match[4], (int)$match[5]];
        }

        return $valid_ranges;
    }
}
