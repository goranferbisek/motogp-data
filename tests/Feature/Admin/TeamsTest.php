<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeamsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_new_team() {
        $this->withoutExceptionHandling();

        $attributes = [
            'name' => $this->faker->company
        ];

        $this->post('/admin/teams/create', $attributes);

        $this->assertDatabaseHas('teams', $attributes);
    }
}
