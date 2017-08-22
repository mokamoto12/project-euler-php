<?php

namespace Mokamoto12\ProjectEuler\Problem\Specification\Composite;

use Mokamoto12\ProjectEuler\Problem\Specification;

/**
 * Class CompositeSpecification
 * @package Mokamoto12\ProjectEuler\Problem\Specification
 */
abstract class CompositeSpecification implements Specification
{
    /**
     * @param int $num
     *
     * @return bool
     */
    abstract public function isSatisfiedBy(int $num): bool;

    /**
     * @param Specification $other
     *
     * @return Specification
     */
    public function and(Specification $other): Specification
    {
        return new AndSpecification($this, $other);
    }

    /**
     * @param Specification $other
     *
     * @return Specification
     */
    public function or(Specification $other): Specification
    {
        return new OrSpecification($this, $other);
    }

    /**
     * @return Specification
     */
    public function not(): Specification
    {
        return new NotSpecification($this);
    }
}
