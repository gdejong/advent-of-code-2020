<?php

declare(strict_types=1);

use gdejong\AoC2020\Day1\Day1Command;
use gdejong\AoC2020\Day10\Day10Command;
use gdejong\AoC2020\Day11\Day11Command;
use gdejong\AoC2020\Day12\Day12Command;
use gdejong\AoC2020\Day13\Day13Command;
use gdejong\AoC2020\Day14\Day14Command;
use gdejong\AoC2020\Day15\Day15Command;
use gdejong\AoC2020\Day16\Day16Command;
use gdejong\AoC2020\Day18\Day18Command;
use gdejong\AoC2020\Day19\Day19Command;
use gdejong\AoC2020\Day2\Day2Command;
use gdejong\AoC2020\Day3\Day3Command;
use gdejong\AoC2020\Day4\Day4Command;
use gdejong\AoC2020\Day5\Day5Command;
use gdejong\AoC2020\Day6\Day6Command;
use gdejong\AoC2020\Day7\Day7Command;
use gdejong\AoC2020\Day8\Day8Command;
use gdejong\AoC2020\Day9\Day9Command;
use Symfony\Component\Console\Application;

require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor/autoload.php";

$application = new Application();

$application->addCommands([
    new Day1Command(),
    new Day2Command(),
    new Day3Command(),
    new Day4Command(),
    new Day5Command(),
    new Day6Command(),
    new Day7Command(),
    new Day8Command(),
    new Day9Command(),
    new Day10Command(),
    new Day11Command(),
    new Day12Command(),
    new Day13Command(),
    new Day14Command(),
    new Day15Command(),
    new Day16Command(),
    // 17
    new Day18Command(),
    new Day19Command(),
]);

$application->run();
