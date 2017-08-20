<?php

namespace Mokamoto12\ProjectEuler\Command;

use Mokamoto12\ProjectEuler\Command\Filesystem\Dumper;
use Mokamoto12\ProjectEuler\Command\Web\Client;
use Mokamoto12\ProjectEuler\Command\Domain\Problem\Number;
use Mokamoto12\ProjectEuler\Command\Domain\Problem\Problem;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ProblemCommand
 * @package Mokamoto12\ProjectEuler\Command
 */
class NewCommand extends Command
{
    /**
     * @var Number
     */
    private $number;

    /**
     * @var Dumper
     */
    private $dumper;

    /**
     * @var Client
     */
    private $client;

    protected function configure()
    {
        $this
            ->setName('new')
            ->setDescription('Create a new problem class file')
            ->addArgument('number', InputArgument::REQUIRED, 'Problem number')
            ;
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $number = $input->getArgument('number');

        if (!is_numeric($number)) {
            throw new \Exception();
        }

        $this->number = new Number((int)$number);
        $this->dumper = $this->getHelper('dumper');
        $this->client = $this->getHelper('client');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $problem = $this->client->fetch(new Number($input->getArgument('number')));
        $this->dumper->create($problem);
    }

    /**
     * @return Problem
     */
    private function fetch(): Problem
    {
        return $this->client->fetch($this->number);
    }

    /**
     * Fetch Question.
     *
     * @param string $problemNum Modified Problem Number
     *
     * @return string
     */
    public function fetchQuestion(string $problemNum): string
    {
        $dom = new \DOMDocument();
        $dom->loadHTMLFile('https://projecteuler.net/problem=' . substr($problemNum, 1));
        $xpath = new \DOMXPath($dom);
        return trim($xpath->query('//div[@class="problem_content"]')[0]->nodeValue);
    }

    /**
     * Format Question.
     *
     * @param string $question Question String
     *
     * @return string
     */
    public function formatQuestion(string $question): string
    {
        return implode("\n", array_map(function ($line) {
            return " * $line";
        }, explode("\n", $question)));
    }
}
