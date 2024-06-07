<?php

namespace Tests\Feature;

use Tests\TestCase;

class NumberControllerTest extends TestCase
{

    public function testGenerateAndRetrieve()
    {
        $response = $this->postJson('/api/v1/generate');

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                ],
            ]);

        $generatedData = $response->json('data');
        $generatedNumberId = $generatedData['id'];

        $response = $this->getJson('/api/v1/retrieve/' . $generatedNumberId);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'number',
                ],
            ]);
    }
}