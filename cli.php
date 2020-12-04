<?php

declare(strict_types=1);

use gdejong\AoC2020\Day1\Day1Command;
use gdejong\AoC2020\Day2\Day2Command;
use gdejong\AoC2020\Day3\Day3Command;
use gdejong\AoC2020\Day4\Day4Command;
use Symfony\Component\Console\Application;

require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor/autoload.php";

$application = new Application();

$application->addCommands([
    new Day1Command(),
    new Day2Command(),
    new Day3Command(),
    new Day4Command(),
]);

$application->run();
