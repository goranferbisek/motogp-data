<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class TeamsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_new_team() {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());

        $attributes = [
            'name' => $this->faker->company
        ];

        $this->post('/admin/teams', $attributes)->assertRedirect('/admin/teams');

        $this->assertDatabaseHas('teams', $attributes);

        $this->get('/admin/teams')->assertSee($attributes['name']);
    }
}
