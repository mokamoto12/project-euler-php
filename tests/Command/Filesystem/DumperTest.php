<?php

namespace Mokamoto12\ProjectEuler\Command\Filesystem;

use Mokamoto12\ProjectEuler\Command\Filesystem\Path;
use Mokamoto12\ProjectEuler\Command\Domain\Problem\Problem;
use Mokamoto12\ProjectEuler\Command\Domain\Problem\Text;
use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Class DumperTest
 * @package Mokamoto12\ProjectEuler\Command\Filesystem
 */
class DumperTest extends TestCase
{
    /**
     * @var Dumper
     */
    public $dumper;

    /**
     * @var Problem
     */
    public $problem;

    /**
     * @var string
     */
    public $tmpDir;

    /**
     * @var string
     */
    public $filePath;

    public function setUp()
    {
        $this->dumper = new Dumper(new Filesystem());
        $this->tmpDir = sys_get_temp_dir() . '/' . microtime(true);
        $this->filePath = $this->tmpDir . '/Problem.php';

        $this->problem = \Mockery::mock(Problem::class);

        $this->problem->shouldReceive('toPath')->andReturn($this->filePath);
        $this->problem->shouldReceive('toFile')->andReturn('problem text.');
    }

    public function testCreate()
    {
        $this->assertFileNotExists($this->filePath);
        $this->dumper->create($this->problem);
        $this->assertFileExists($this->filePath);
        $this->assertFileEquals(__DIR__.'/Stub/Problem.txt', $this->filePath);
    }

    public function tearDown()
    {
        unlink($this->filePath);
        rmdir($this->tmpDir);
    }
}
