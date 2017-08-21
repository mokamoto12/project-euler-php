<?php

require __DIR__.'/../bootstrap/autoload.php';

use Mokamoto12\ProjectEuler\Application;
use Mokamoto12\ProjectEuler\Problem\Sequence\FibonacciSequence;
use Mokamoto12\ProjectEuler\Problem\Specification\EvenSpecification;
use Mokamoto12\ProjectEuler\Problem\SumProblem;
use Mokamoto12\ProjectEuler\Problem\Sequence\NaturalSequence;
use Mokamoto12\ProjectEuler\Problem\Specification\MultipleSpecification;

$problem = new SumProblem(new NaturalSequence(1000), (new MultipleSpecification(3))->or(new MultipleSpecification(5)));

$app = new Application($problem);
$app->run();

$problem2 = new SumProblem(new FibonacciSequence(4000000), new EvenSpecification());

$app2 = new Application($problem2);
$app2->run();
