<?php

namespace Mokamoto12\ProjectEuler\Command\Filesystem;

/**
 * Class Path
 * @package Mokamoto12\ProjectEuler\Command\Filesystem
 */
class Path
{
    private $name;

    /**
     * Path constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function toPath(): string
    {
        return $this->name;
    }
}
