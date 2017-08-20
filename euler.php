#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use Mokamoto12\ProjectEuler\Command\NewCommand;

require __DIR__ . '/bootstrap/autoload.php';

$app = new Application('Project Euler', '0.1');
$app->addCommands([
    new NewCommand()
]);
$app->run();
