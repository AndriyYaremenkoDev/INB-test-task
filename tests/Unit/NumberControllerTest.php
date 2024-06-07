<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\Api\NumberController;
use App\Http\Requests\Api\Number\NumberRetrieveRequest;
use App\Contracts\Api\Number\NumberServiceInterface;
use App\Models\Number;
use App\Http\Resources\Number\NumberGenerateResource;
use App\Http\Resources\Number\NumberRetrieveResource;
use Mockery;

class NumberControllerTest extends TestCase
{
    protected $numberController;
    protected $numberServiceMock;

    public function setUp(): void
    {
        parent::setUp();

        $this->numberServiceMock = Mockery::mock(NumberServiceInterface::class);

        $this->numberController = new NumberController($this->numberServiceMock);
    }

    public function testGenerate()
    {
        $fakeNumber = new Number(['number' => 50]);
        $this->numberServiceMock->shouldReceive('generate')->once()->andReturn($fakeNumber);

        $response = $this->numberController->generate();

        $this->assertInstanceOf(NumberGenerateResource::class, $response);
    }

    public function testRetrieve()
    {
        $request = Mockery::mock(NumberRetrieveRequest::class);
        $request->shouldReceive('validated')->once()->andReturn(['id' => 1]);

        $fakeNumber = new Number(['id' => 1, 'number' => 50]);
        $this->numberServiceMock->shouldReceive('retrieve')->once()->with(1)->andReturn($fakeNumber);

        $response = $this->numberController->retrieve($request);

        $this->assertInstanceOf(NumberRetrieveResource::class, $response);
    }

    public function tearDown(): void
    {
        parent::tearDown();

        Mockery::close();
    }
}