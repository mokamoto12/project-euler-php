<?php

namespace Mokamoto12\ProjectEuler\Problem;

use Mokamoto12\ProjectEuler\Problem\Sequence\Sequence;
use Mokamoto12\ProjectEuler\Problem\Specification\Composite\CompositeSpecification;
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
        $this->specification = \Mockery::mock(CompositeSpecification::class);
        $this->specification->shouldReceive('isSatisfiedBy')->once()->andReturn(true);

        $this->sequence = \Mockery::mock(Sequence::class);
    }

    public function testResolve()
    {
        $this->sequence->shouldReceive('filteredBy')->once()->andReturn([3, 5, 6, 9]);

        $this->sumProblem = new SumProblem($this->sequence, $this->specification);

        $this->assertEquals(23, $this->sumProblem->resolve());
    }

    public function testResolveEmptySequence()
    {
        $this->sequence->shouldReceive('filteredBy')->once()->andReturn([]);

        $this->sumProblem = new SumProblem($this->sequence, $this->specification);

        $this->assertEquals(0, $this->sumProblem->resolve());
    }
}
