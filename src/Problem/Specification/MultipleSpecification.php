<?php

namespace Mokamoto12\ProjectEuler\Problem\Specification;

use Mokamoto12\ProjectEuler\Problem\Specification\Composite\CompositeSpecification;

/**
 * Class DivisibleSpecification
 * @package Mokamoto12\ProjectEuler\Problem\Specification
 */
class MultipleSpecification extends CompositeSpecification
{
    /**
     * @var int
     */
    private $divisor;

    /**
     * DivisibleSpecification constructor.
     *
     * @param int $divisor
     */
    public function __construct(int $divisor)
    {
        $this->divisor = $divisor;
    }

    /**
     * @param int $num
     *
     * @return bool
     */
    public function isSatisfiedBy(int $num): bool
    {
        return $num % $this->divisor === 0;
    }
}
