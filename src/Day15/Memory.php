<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day15;

class Memory
{
    public function run(array $input, int $max_turn): int
    {
        ini_set('memory_limit', '2G'); // :(

        // Keep track of the two most recent turns per spoken number
        $turns_by_number = [];
        // Keep track of the unique spoken numbers
        $unique = [];
        foreach ($input as $index => $item) {
            $unique[$item] = 1;
            $turns_by_number[$item][] = $index;
        }

        $last_number_spoken = end($input);
        $first_time = true;
        for ($i = count($input); $i < $max_turn; $i++) {
            if ($first_time) {
                $last_number_spoken = 0;
            } else {
                $keys_of_last_spoken_number = $turns_by_number[$last_number_spoken];
                $last_number_spoken = $keys_of_last_spoken_number[1] - $keys_of_last_spoken_number[0];
            }

            // Store the turn at which we got this new number
            $turns_by_number[$last_number_spoken][] = $i;

            // Only keep track of the last 2 turns per answer.
            if (count($turns_by_number[$last_number_spoken]) > 2) {
                $last = end($turns_by_number[$last_number_spoken]);
                $second_to_last = prev($turns_by_number[$last_number_spoken]);
                $turns_by_number[$last_number_spoken] = [$second_to_last, $last];
            }

            // Store if this number was spoken for the first time, used by the next iteration
            $first_time = !isset($unique[$last_number_spoken]);
            // Store that we saw this number
            $unique[$last_number_spoken] = 1;
        }

        return $last_number_spoken;
    }
}
