<?php

namespace Mokamoto12\ProjectEuler\Problem;

use Mokamoto12\ProjectEuler\Problem\Sequence\NaturalSequence;
use Mokamoto12\ProjectEuler\Problem\Sequence\Sequence;
use Mokamoto12\ProjectEuler\Problem\Specification\MultipleSpecification;
use Mokamoto12\ProjectEuler\Problem\Specification\Specification;
use PHPUnit\Framework\TestCase;

/**
 * Class SumProblemTest
 * @package Mokamoto12\ProjectEuler\Problem
 */
class SumProblemTest extends TestCase
{
    /**
     * @var SumProblem
     */
    public $sumProblem;

    /**
     * @var Sequence
     */
    public $sequence;

    /**
     * @var Specification
     */
    public $specification;

    public function setUp()
    {
        $this->specification = new MultipleSpecification(3);
        $this->sequence = new NaturalSequence(10);
        $this->sumProblem = new SumProblem($this->sequence, $this->specification);
    }

    public function testResolve()
    {
        $this->assertEquals(18, $this->sumProblem->resolve());
    }
}
