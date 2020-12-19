<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day18;

use RuntimeException;
use SplStack;

class WeirdMath
{
    public function solvePart1(array $input): int
    {
        $result = 0;

        foreach ($input as $problem) {
            $result += $this->solveProblem($problem, 1);
        }

        return $result;
    }

    public function solvePart2(array $input): int
    {
        $result = 0;

        foreach ($input as $problem) {
            $result += $this->solveProblem($problem, 2);
        }

        return $result;
    }

    private function solveProblem(string $problem, int $part): int
    {
        $problem_as_postfix = $this->infixToPostfix($problem, $part);

        return $this->evaluatePostfix($problem_as_postfix);
    }

    /**
     * @see https://www.geeksforgeeks.org/stack-set-2-infix-to-postfix/
     */
    private function infixToPostfix(string $infix, int $part): string
    {
        $stack = new SplStack();
        $infix = str_replace([")", "("], [" )", "( "], $infix);
        $infix_parts = explode(" ", $infix);

        $result = "";

        foreach ($infix_parts as $token) {
            if (is_numeric($token)) {
                $result .= $token . " ";
            } elseif ($token === "(") {
                $stack->push($token);
            } elseif ($token === ")") {
                while (!$stack->isEmpty() && $stack->top() !== "(") {
                    $result .= $stack->pop() . " ";
                }
                $stack->pop();
            } else {
                while (!$stack->isEmpty() && $this->precedence($token, $part) <= $this->precedence($stack->top(), $part)) {
                    $result .= $stack->pop() . " ";
                }
                $stack->push($token);
            }
        }

        while (!$stack->isEmpty()) {
            $result .= $stack->pop() . " ";
        }

        return trim($result);
    }

    private function precedence(string $ch, int $part): int
    {
        if ($part === 1) {
            return match ($ch) {
                // Crazy math rules
                "+", "*", => 1,
                default => -1,
            };
        }

        return match ($ch) {
            // Crazy math rules, part 2
            "*", => 1,
            "+", => 2,
            default => -1,
        };
    }

    /**
     * @see https://www.youtube.com/watch?v=_TGyjXjg04w
     */
    private function evaluatePostfix(string $postfix): int
    {
        $stack = new SplStack();
        $postfix_parts = explode(" ", $postfix);

        foreach ($postfix_parts as $token) {
            if (is_numeric($token)) {
                $stack->push($token);
            } else {
                $stack->push(match ($token) {
                    "*" => $stack->pop() * $stack->pop(),
                    "+" => $stack->pop() + $stack->pop(),
                });
            }
        }

        if (count($stack) !== 1) {
            throw new RuntimeException("error");
        }

        return $stack->pop();
    }
}
