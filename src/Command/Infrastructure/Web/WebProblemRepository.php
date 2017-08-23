<?php

namespace Mokamoto12\ProjectEuler\Command\Web;

use Interop\Http\Factory\RequestFactoryInterface;
use Interop\Http\Factory\UriFactoryInterface;
use Mokamoto12\ProjectEuler\Command\Domain\Problem\Number;
use Mokamoto12\ProjectEuler\Command\Domain\Problem\Problem;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Mokamoto12\ProjectEuler\Command\Domain\Problem\Text;

/**
 * Class Client
 * @package Mokamoto12\ProjectEuler\Web
 */
class Client
{
    const PROBLEM_URI = 'https://projecteuler.net/problem=';

    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;

    /**
     * @var UriFactoryInterface
     */
    private $uriFactory;

    /**
     * Client constructor.
     *
     * @param RequestFactoryInterface $request
     * @param UriFactoryInterface $uri
     */
    public function __construct(RequestFactoryInterface $request, UriFactoryInterface $uri)
    {
        $this->requestFactory = $request;
        $this->uriFactory = $uri;
    }

    /**
     * @param Number $number
     *
     * @return Problem
     */
    public function fetch(Number $number): Problem
    {
        $request = $this->requestFactory->createRequest('GET', 'test'.$number->toString());
        return new Problem($number, new Text($this->send($request)->getBody()->getContents()));
    }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function send(RequestInterface $request): ResponseInterface
    {
    }
}
