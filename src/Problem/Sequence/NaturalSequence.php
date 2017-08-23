<?php

namespace Mokamoto12\ProjectEuler\Problem\Sequence;

use Mokamoto12\ProjectEuler\Problem\Sequence;
use Mokamoto12\ProjectEuler\Problem\Specification;

/**
 * Class RangeSequence
 * @package Mokamoto12\ProjectEuler\Problem\Sequence
 */
class NaturalSequence implements Sequence
{
    /**
     * @var int[]
     */
    private $sequence;

    /**
     * RangeSequence constructor.
     *
     * @param int $below
     */
    public function __construct(int $below)
    {
        $this->sequence = range(1, $below - 1);
    }

    /**
     * @param Specification $specification
     *
     * @return \Generator
     */
    public function filteredBy(Specification $specification): \Generator
    {
        foreach ($this->sequence as $num) {
            if ($specification->isSatisfiedBy($num)) {
                yield $num;
            }
        }
    }
}
