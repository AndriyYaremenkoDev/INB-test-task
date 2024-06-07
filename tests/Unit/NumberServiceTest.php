<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Number;
use App\Services\Api\Number\NumberService;
use Mockery;

class NumberServiceTest extends TestCase
{
    protected $numberService;
    protected $numberModelMock;

    public function setUp(): void
    {
        parent::setUp();

        $this->numberModelMock = Mockery::mock(Number::class);

        $this->numberService = new NumberService($this->numberModelMock);
    }

    public function testGenerate()
    {
        $this->numberModelMock->shouldReceive('create')->once()->andReturn(new Number(['number' => 50]));

        $number = $this->numberService->generate();

        $this->assertInstanceOf(Number::class, $number);

        $this->assertGreaterThanOrEqual(1, $number->number);
        $this->assertLessThanOrEqual(100, $number->number);
    }

    public function testRetrieve()
    {
        $fakeNumber = new Number(['id' => 1, 'number' => 50]);

        $this->numberModelMock->shouldReceive('findOrFail')->once()->with(1)->andReturn($fakeNumber);

        $number = $this->numberService->retrieve(1);

        $this->assertInstanceOf(Number::class, $number);

        $this->assertEquals($fakeNumber, $number);
    }

    public function tearDown(): void
    {
        parent::tearDown();

        Mockery::close();
    }
}