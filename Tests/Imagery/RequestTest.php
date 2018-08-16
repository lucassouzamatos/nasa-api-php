<?php

namespace Nasa\Tests\Imagery;

use Nasa\Imagery\Resource;
use PHPUnit\Framework\TestCase;
use Nasa\Imagery\Request;
use Nasa\Tests\Helpers\Creator;

class RequestTest extends TestCase {

    private $parameterComplete;
    private $parameterIncomplete;

    public function setUp()
    {
        parent::setUp();
        $this->parameterComplete = Creator::createParameterComplete();
        $this->parameterIncomplete = Creator::createParameterIncomplete();
    }

    public function testGetRequest()
    {
        $request = new Request($this->parameterComplete);
        $this->assertInstanceOf(Request::class, $request);
    }

    public function testGetRequestResource()
    {
        $request = new Request($this->parameterComplete);

        /** @var Resource $resource */
        $resource = $request->getResource();

        $this->assertInstanceOf(Resource::class, $resource);
        $this->assertNotEmpty($resource->getPlanet(), $resource);
    }

    public function testGetRequestResourceWithParameterIncomplete()
    {
        $request = new Request($this->parameterIncomplete);
        $this->assertNotEquals(0, $request->getErrors());
    }

}