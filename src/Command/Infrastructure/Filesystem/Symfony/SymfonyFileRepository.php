<?php
namespace Mokamoto12\ProjectEuler\Command\Filesystem;

use Mokamoto12\ProjectEuler\Command\Domain\Problem\Problem;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class Dumper
 * @package Mokamoto12\ProjectEuler\Command\Filesystem
 */
class Dumper
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * Dumper constructor.
     *
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @param Problem $problem
     */
    public function create(Problem $problem)
    {
        $this->filesystem->dumpFile($problem->toPath(), $problem->toFile());
    }
}
