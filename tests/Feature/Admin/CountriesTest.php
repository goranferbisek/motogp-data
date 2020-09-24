<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class CountriesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_new_country()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());

        $attributes = [
            'name' => $this->faker->unique()->country
        ];

        $this->post('/admin/countries', $attributes)->assertRedirect('/admin/countries');

        $this->assertDatabaseHas('teams', $attributes);

        $this->get('/admin/countries')->assertSee($attributes['name']);
    }
}