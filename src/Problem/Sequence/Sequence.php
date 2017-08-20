<?php

namespace Mokamoto12\ProjectEuler\Problem\Sequence;

use Mokamoto12\ProjectEuler\Problem\Specification\Specification;

/**
 * Interface Sequence
 * @package Mokamoto12\ProjectEuler\Problem\Sequence
 */
interface Sequence
{
    /**
     * @param Specification $specification
     *
     * @return array
     */
    public function filteredBy(Specification $specification): array;
}
