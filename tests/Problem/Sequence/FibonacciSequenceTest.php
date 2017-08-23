<?php

namespace Mokamoto12\ProjectEuler\Problem\Sequence;

use Mokamoto12\ProjectEuler\Problem\Sequence;
use Mokamoto12\ProjectEuler\Problem\Specification;
use Mokamoto12\ProjectEuler\Problem\Specification\MultipleSpecification;
use PHPUnit\Framework\TestCase;

/**
 * Class FibonacciSequenceTest
 * @package Mokamoto12\ProjectEuler\Problem\Sequence
 */
class FibonacciSequenceTest extends TestCase
{
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
        $this->sequence = new FibonacciSequence(21);
        $this->specification = new MultipleSpecification(1);
    }

    public function testFilteredBy()
    {
        $actual = $this->sequence->filteredBy($this->specification);
        $this->assertInstanceOf(\Generator::class, $actual);
        $this->assertEquals([1, 2, 3, 5, 8, 13, 21], iterator_to_array($actual));
    }
}
