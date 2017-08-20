<?php

namespace Mokamoto12\ProjectEuler\Problem;

use Mokamoto12\ProjectEuler\Problem\Sequence\Sequence;
use Mokamoto12\ProjectEuler\Problem\Specification\Specification;

/**
 * Trait SumProblemResolveTrait
 * @package Mokamoto12\ProjectEuler\Problem
 */
trait SumProblemResolveTrait
{
    /**
     * @var Sequence
     */
    private $sequence;

    /**
     * @var Specification
     */
    private $specification;

    /**
     * @return int
     */
    public function resolve()
    {
        return (int)array_sum($this->sequence->filteredBy($this->specification));
    }
}
