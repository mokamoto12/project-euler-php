<?php

namespace Mokamoto12\ProjectEuler\Problem\Sequence;

use Mokamoto12\ProjectEuler\Problem\Specification\Specification;

/**
 * Class FibonacciSequence
 * @package Mokamoto12\ProjectEuler\Problem\Sequence
 */
class FibonacciSequence implements Sequence
{
    /**
     * @var \Generator
     */
    private $fibonacci;

    /**
     * FibonacciSequence constructor.
     *
     * @param int $max
     */
    public function __construct(int $max)
    {
        $this->fibonacci = $this->generator($max);
    }

    /**
     * @param Specification $specification
     *
     * @return array
     */
    public function filteredBy(Specification $specification): array
    {
        $ret = [];
        foreach ($this->fibonacci as $num) {
            if ($specification->isSatisfiedBy($num)) {
                $ret[] = $num;
            }
        }
        return $ret;
    }

    /**
     * @param int $max
     *
     * @return \Generator
     */
    private function generator(int $max): \Generator
    {
        $current = 1;
        $carry = 2;
        while (true) {
            yield $current;

            list($current, $carry) = [$carry, $current + $carry];

            if ($current > $max) {
                break;
            }
        }
    }
}
