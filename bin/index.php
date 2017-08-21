<?php

require __DIR__.'/../bootstrap/autoload.php';

use Mokamoto12\ProjectEuler\Application;
use Mokamoto12\ProjectEuler\Problem\SumProblem;
use Mokamoto12\ProjectEuler\Problem\Sequence\RangeSequence;
use Mokamoto12\ProjectEuler\Problem\Specification\DivisibleSpecification;

$problem = new SumProblem(new RangeSequence(1000), (new DivisibleSpecification(3))->or(new DivisibleSpecification(5)));

$app = new Application($problem);
$app->run();
