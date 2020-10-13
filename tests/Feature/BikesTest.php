<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BikesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_new_bike()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());
        $attributes = [
            'make' => $this->faker->unique()->company
        ];

        $this->post('/admin/bikes', $attributes)->assertRedirect('/admin/bikes');
        $this->assertDatabaseHas('bikes', $attributes);
        $this->get('/admin/bikes')->assertSee($attributes['make']);
    }
}
