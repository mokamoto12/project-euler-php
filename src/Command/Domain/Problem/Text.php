<?php

namespace Mokamoto12\ProjectEuler\Command\Domain\Problem;

/**
 * Class Problem
 * @package Mokamoto12\ProjectEuler\Command\Filesystem
 */
class Text
{
    /**
     * @var string
     */
    private $content;

    /**
     * Problem constructor.
     *
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function toFile(): string
    {
        return 'test';
    }
}
