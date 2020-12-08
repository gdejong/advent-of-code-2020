<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day8;

use LogicException;
use RuntimeException;

class Program
{
    public function part1(array $instructions): int
    {
        $accumulator = 0;
        $seen = [];
        $nextInstruction = 0;

        while (true) {
            [$op, $arg] = $this->splitOpAndArg($instructions[$nextInstruction]);

            // When we encounter an instruction for the second time return the accumulator
            if (isset($seen[$nextInstruction])) {
                return $accumulator;
            }
            $seen[$nextInstruction] = 1;

            switch ($op) {
                case "nop":
                    $nextInstruction++;
                    break;
                case "acc":
                    $accumulator += $arg;
                    $nextInstruction++;
                    break;
                case "jmp":
                    $nextInstruction += $arg;
                    break;
                default:
                    throw new RuntimeException("unsupported operation $op");
            }
        }
    }

    private function splitOpAndArg(string $instruction): array
    {
        [$op, $arg] = explode(" ", $instruction);
        if (!is_numeric($arg)) {
            throw new RuntimeException("$arg is not numeric");
        }
        $op = trim($op);
        $arg = (int)$arg;

        return [$op, $arg];
    }

    public function part2(array $instructions): int
    {
        $originalInstructions = $instructions;

        // Change all nop's/jmp's one after the other and see if the program halts
        foreach ($instructions as $index => $instruction) {
            $testInstructionsThisIteration = $originalInstructions;
            [$op, $arg] = $this->splitOpAndArg($instruction);
            if ($op === "jmp") {
                $testInstructionsThisIteration[$index] = "nop $arg";
            } elseif ($op === "nop") {
                $testInstructionsThisIteration[$index] = "jmp $arg";
            }
            try {
                return $this->tryRun($testInstructionsThisIteration);
            } catch (LogicException) {
                continue;
            }
        }

        throw new RuntimeException("failed part2");
    }

    private function tryRun(array $instructions): int
    {
        $accumulator = 0;
        $seen = [];
        $nextInstruction = 0;

        $lastInstruction = count($instructions);

        while (true) {
            // Return the accumulator after the last command
            if ($nextInstruction === $lastInstruction) {
                return $accumulator;
            }

            [$op, $arg] = $this->splitOpAndArg($instructions[$nextInstruction]);

            // Throw when a loop is detected
            if (isset($seen[$nextInstruction])) {
                throw new LogicException("loop encountered");
            }
            $seen[$nextInstruction] = 1;

            switch ($op) {
                case "nop":
                    $nextInstruction++;
                    break;
                case "acc":
                    $accumulator += $arg;
                    $nextInstruction++;
                    break;
                case "jmp":
                    $nextInstruction += $arg;
                    break;
                default:
                    throw new RuntimeException("unsupported operation $op");
            }
        }
    }
}
