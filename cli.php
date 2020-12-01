<?php

declare(strict_types=1);

use gdejong\AoC2020\Day1\Day1Command;
use Symfony\Component\Console\Application;

require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor/autoload.php";

$application = new Application();

$application->addCommands([
    new Day1Command(),
]);

$application->run();
