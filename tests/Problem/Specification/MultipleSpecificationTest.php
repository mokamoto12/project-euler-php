<?php

namespace Mokamoto12\ProjectEuler\Problem\Specification;

use Mokamoto12\ProjectEuler\Problem\Specification;
use PHPUnit\Framework\TestCase;

/**
 * Class MultipleSpecificationTest
 * @package Mokamoto12\ProjectEuler\Problem\Specification
 */
class MultipleSpecificationTest extends TestCase
{
    /**
     * @var Specification
     */
    public $specification;

    /**
     * @var Specification
     */
    public $specification2;

    public function setUp()
    {
        $this->specification = new MultipleSpecification(3);
        $this->specification2 = new MultipleSpecification(5);
    }

    public function testIsSatisfiedBy()
    {
        $this->assertTrue($this->specification->isSatisfiedBy(9));
    }

    public function testIsSatisfiedByZero()
    {
        $this->assertTrue($this->specification->isSatisfiedBy(0));
    }

    public function testIsSatisfiedByFalse()
    {
        $this->assertFalse($this->specification->isSatisfiedBy(5));
    }

    public function testAnd()
    {
        $compositeSpec = $this->specification->and($this->specification2);
        $this->assertTrue($compositeSpec->isSatisfiedBy(15));
    }

    public function testOr()
    {
        $compositeSpec = $this->specification->or($this->specification2);
        $this->assertTrue($compositeSpec->isSatisfiedBy(5));
    }

    public function testNot()
    {
        $this->assertFalse($this->specification->not()->isSatisfiedBy(3));
    }
}
