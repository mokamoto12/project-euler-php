<?php

namespace Mokamoto12\ProjectEuler\Problem;

use Mokamoto12\ProjectEuler\Problem\Specification;

/**
 * Interface Sequence
 * @package Mokamoto12\ProjectEuler\Problem\Sequence
 */
interface Sequence
{
    /**
     * @param Specification $specification
     *
     * @return \Generator
     */
    public function filteredBy(Specification $specification): \Generator;
}
