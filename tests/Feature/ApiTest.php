<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ApiTest extends TestCase
{

    /**
     * @return void
     */
    public function testBasicRequest(): void
    {
        $response = $this->get('/api/v1/report/format=json');
        $response->assertStatus(200);
    }

    public function testScopingCollection()
    {
        $response = $this->getJson('/api/v1/report/format=json');
        $response->assertJson(fn (AssertableJson $json) =>
            $json->has(19)
                ->first(fn ($json) =>
                  $json->where('id','DRR')
                    ->where('name','Daniel Ricciardo')
                    ->where('score','57:12.013')
                    ->where('team','Red Bull Racing-TAG Heuer')
            )
        );
    }

    public function testJsonDataTypes()
    {
        $response = $this->getJson('/api/v1/report/format=json');
        $response->assertJson(fn (AssertableJson $json) =>
        $json->has(19)->first(fn ($json) =>
        $json->whereType('id','string')
            ->whereType('name','string')
            ->whereType('score','string')
            ->whereType('team','string')
            ->etc()
        ));
    }


}
