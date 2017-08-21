<?php

namespace Mokamoto12\ProjectEuler\Problem\Specification;

use Mokamoto12\ProjectEuler\Problem\Specification\Composite\CompositeSpecification;

/**
 * Class EvenSpecification
 * @package Mokamoto12\ProjectEuler\Problem\Specification
 */
class EvenSpecification extends CompositeSpecification
{
    /**
     * @param int $num
     *
     * @return bool
     */
    public function isSatisfiedBy(int $num): bool
    {
        return $num % 2 === 0;
    }
}
