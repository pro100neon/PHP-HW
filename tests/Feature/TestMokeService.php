<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\TestBasicService;

class TestMokeService extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->mock(TestBasicService::class, function ($mock) {
            $mock->shouldReceive('getForMock')->once()->andReturn('my third test');
            $result = $mock->getForMock('ok');
            $this->assertEquals($result, 'my third test');
        });
    }
}
