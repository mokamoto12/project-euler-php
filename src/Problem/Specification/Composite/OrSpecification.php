<?php

namespace Mokamoto12\ProjectEuler\Problem\Specification\Composite;

use Mokamoto12\ProjectEuler\Problem\Specification;

/**
 * Class OrSpecification
 * @package Mokamoto12\ProjectEuler\Problem\Specification
 */
class OrSpecification extends CompositeSpecification
{
    /**
     * @var Specification
     */
    private $leftCondition;

    /**
     * @var Specification
     */
    private $rightCondition;

    /**
     * OrSpecification constructor.
     *
     * @param Specification $left
     * @param Specification $right
     */
    public function __construct(Specification $left, Specification $right)
    {
        $this->leftCondition = $left;
        $this->rightCondition = $right;
    }

    /**
     * @param int $num
     *
     * @return bool
     */
    public function isSatisfiedBy(int $num): bool
    {
        return $this->leftCondition->isSatisfiedBy($num) || $this->rightCondition->isSatisfiedBy($num);
    }
}
