<?php

namespace Mokamoto12\ProjectEuler\Problem\Specification;

/**
 * Interface Specification
 * @package Mokamoto12\ProjectEuler\Problem\Specification
 */
interface Specification
{
    /**
     * @param int $num
     *
     * @return bool
     */
    public function isSatisfiedBy(int $num): bool;

    /**
     * @param Specification $specification
     *
     * @return Specification
     */
    public function and(Specification $specification): Specification;

    /**
     * @param Specification $specification
     *
     * @return Specification
     */
    public function or(Specification $specification): Specification;

    /**
     * @return Specification
     */
    public function not(): Specification;
}
