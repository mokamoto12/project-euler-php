<?php

require __DIR__.'/../bootstrap/autoload.php';

use Lavoiesl\PhpBenchmark\Benchmark;
use Mokamoto12\ProjectEuler\Application;
use Mokamoto12\ProjectEuler\Problem\Sequence\FibonacciSequence;
use Mokamoto12\ProjectEuler\Problem\Specification\EvenSpecification;
use Mokamoto12\ProjectEuler\Problem\SumProblem;
use Mokamoto12\ProjectEuler\Problem\Sequence\NaturalSequence;
use Mokamoto12\ProjectEuler\Problem\Specification\MultipleSpecification;

$problem = new SumProblem(new NaturalSequence(1000), (new MultipleSpecification(3))->or(new MultipleSpecification(5)));
$problem2 = new SumProblem(new FibonacciSequence(4000000), new EvenSpecification());

$benchmark = new Benchmark();

$benchmark->add('Problem 1', function () use ($problem) {
    $problem->resolve();
});

$benchmark->add('Problem 2', function () use ($problem2) {
    $problem2->resolve();
});

$benchmark->run();

$app = new Application($problem);
$app2 = new Application($problem2);

$app->run();
$app2->run();
