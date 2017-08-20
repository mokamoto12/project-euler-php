<?php

namespace Mokamoto12\ProjectEuler\Problem;

use Mokamoto12\ProjectEuler\Problem\Sequence\Sequence;
use Mokamoto12\ProjectEuler\Problem\Specification\Specification;

/**
 * Class Problem001
 * @package Mokamoto12\ProjectEuler\Problem
 */
class Problem001 implements Problem
{
    use SumProblemResolveTrait;
    /**
     * @var Sequence
     */
    private $sequence;

    /**
     * @var Specification
     */
    private $specification;

    /**
     * Problem001 constructor.
     *
     * @param Sequence $sequence
     * @param Specification $specification
     */
    public function __construct(Sequence $sequence, Specification $specification)
    {
        $this->sequence = $sequence;
        $this->specification = $specification;
    }
}
