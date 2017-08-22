<?php

namespace Mokamoto12\ProjectEuler\Problem\Specification\Composite;

use Mokamoto12\ProjectEuler\Problem\Specification;

/**
 * Class NotSpecification
 * @package Mokamoto12\ProjectEuler\Problem\Specification
 */
class NotSpecification extends CompositeSpecification
{
    private $self;

    /**
     * NotSpecification constructor.
     *
     * @param Specification $self
     */
    public function __construct(Specification $self)
    {
        $this->self = $self;
    }

    /**
     * @param int $num
     *
     * @return bool
     */
    public function isSatisfiedBy(int $num): bool
    {
        return !$this->self->isSatisfiedBy($num);
    }
}