<?php

namespace Mokamoto12\ProjectEuler\Command\Domain\Problem;

use Mokamoto12\ProjectEuler\Command\Web\Number;

/**
 * Class Problem
 * @package Mokamoto12\ProjectEuler\Command\Web\Problem
 */
class Problem
{
    /**
     * @var Number
     */
    private $number;

    /**
     * @var Text
     */
    private $text;

    /**
     * Problem constructor.
     *
     * @param Number $number
     * @param Text $text
     */
    public function __construct(Number $number, Text $text)
    {
        $this->number = $number;
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function toPath(): string
    {
        return $this->number->toFilePath();
    }

    /**
     * @return string
     */
    public function toFile(): string
    {
        return $this->text;
    }
}
