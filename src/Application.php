<?php
namespace Mokamoto12\ProjectEuler;

use Mokamoto12\ProjectEuler\Problem\Problem;

/**
 * Class Application
 * @package Mokamoto12\ProjectEuler
 */
class Application
{
    /**
     * @var Problem
     */
    private $problem;

    /**
     * Application constructor.
     *
     * @param Problem $problem
     */
    public function __construct(Problem $problem)
    {
        $this->problem = $problem;
    }

    public function run():void
    {
        echo $this->problem->resolve() . "\n";
    }
}
