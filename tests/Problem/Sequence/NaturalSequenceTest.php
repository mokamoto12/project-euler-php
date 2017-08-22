<?php

namespace Mokamoto12\ProjectEuler\Problem\Sequence;

use Mokamoto12\ProjectEuler\Problem\Sequence;
use Mokamoto12\ProjectEuler\Problem\Specification\MultipleSpecification;
use PHPUnit\Framework\TestCase;

/**
 * Class NaturalSequenceTset
 * @package Mokamoto12\ProjectEuler\Problem\Sequence
 */
class NaturalSequenceTest extends TestCase
{
    /**
     * @var Sequence
     */
    public $sequence;

    public function setUp()
    {
        $this->sequence = new NaturalSequence(10);
    }

    public function testFilteredBy()
    {
        $this->assertEquals([3, 6, 9], $this->sequence->filteredBy(new MultipleSpecification(3)));
    }
}
