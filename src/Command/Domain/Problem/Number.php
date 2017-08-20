<?php

namespace Mokamoto12\ProjectEuler\Command\Domain\Problem;

/**
 * Class ProblemNumber
 * @package Mokamoto12\ProjectEuler\Command\Web
 */
class Number
{
    /**
     * @var int
     */
    private $number;

    /**
     * ProblemNumber constructor.
     *
     * @param int $number
     */
    public function __construct(int $number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function modifyTo(): string
    {
        return (string)$this->number;
    }
}
