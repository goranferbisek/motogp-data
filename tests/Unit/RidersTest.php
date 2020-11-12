<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RidersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function rider_has_a_team()
    {
        $rider = factory('App\Rider')->create();
        $this->assertInstanceOf('App\Team', $rider->team);
    }
}
