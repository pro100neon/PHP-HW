<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Facades\TestBasicServiceFacade;

class TestMokeServiceFacade extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        TestBasicServiceFacade::shouldReceive('getForMock')->once()->andReturn('my third test');
        $result = TestBasicServiceFacade::getForMock('ok');
        $this->assertEquals($result, 'my third test');
    }
}
