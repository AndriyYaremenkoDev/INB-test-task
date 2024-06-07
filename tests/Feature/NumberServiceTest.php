<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Number;
use App\Services\Api\Number\NumberService;

class NumberServiceTest extends TestCase
{
    protected $numberService;

    public function setUp(): void
    {
        parent::setUp();
        $this->numberService = new NumberService();
    }

    public function testGenerateAndRetrieve()
    {
        $number = $this->numberService->generate();

        $this->assertInstanceOf(Number::class, $number);
        $this->assertNotNull($number->number);

        $retrievedNumber = $this->numberService->retrieve($number->id);

        $this->assertEquals($number->id, $retrievedNumber->id);
    }
}
