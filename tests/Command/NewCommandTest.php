<?php

namespace Mokamoto12\ProjectEuler\Command;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class NewCommandTest
 * @package Mokamoto12\ProjectEuler\Command
 */
class NewCommandTest extends TestCase
{
    /**
     * @var NewCommand
     */
    public $command;

    public function setUp()
    {
        $this->command = new NewCommand();
    }

    public function testConfigureName()
    {
        $this->assertEquals('new', $this->command->getName());
    }

    public function testConfigureDescription()
    {
        $this->assertEquals('Create a new problem class file', $this->command->getDescription());
    }

    public function testConfigureArgument()
    {
        $argumentDefinition = $this->command->getDefinition()->getArgument('number');

        $this->assertEquals('number', $argumentDefinition->getName());
        $this->assertEquals('Problem number', $argumentDefinition->getDescription());
        $this->assertTrue($argumentDefinition->isRequired());
    }

    public function testInitialize()
    {

    }

    public function testInitializeInvalidArgument()
    {

    }

    public function testExecute()
    {
        $commandTester = new CommandTester($this->command);
    }
}
