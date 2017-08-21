<?php

namespace Mokamoto12\ProjectEuler\Problem\Specification;

use PHPUnit\Framework\TestCase;

/**
 * Class EvenSpecification
 * @package Mokamoto12\ProjectEuler\Problem\Specification
 */
class EvenSpecificationTest extends TestCase
{
    /**
     * @var Specification
     */
    public $specification;

    public function setUp()
    {
        $this->specification = new EvenSpecification();
    }

    public function testIsSatisfiedBy()
    {
        $this->assertTrue($this->specification->isSatisfiedBy(4));
    }

    public function testIsSatisfiedByFalse()
    {
        $this->assertFalse($this->specification->isSatisfiedBy(3));
    }
}
