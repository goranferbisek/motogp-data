<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Rider;

class RidersTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_new_rider()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());
        $attributes = factory(Rider::class)->raw();

        $this->post('/admin/riders', $attributes)
            ->assertRedirect('/admin/riders');
        $this->assertDatabaseHas('riders', $attributes);
        $this->get('/admin/riders')->assertSee($attributes['name']);
    }

    /** @test */
    public function a_user_can_edit_a_rider()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $rider = factory(Rider::class)->create();

        $this->get('/admin/riders/' . $rider->id . '/edit')
            ->assertSee($rider->name);

        $attributes = $rider->toArray();
        $attributes['name'] = 'Changed Name';

        $this->put('/admin/riders/' . $rider->id, $attributes)
            ->assertRedirect('/admin/riders');
        $this->get('/admin/riders/' . $rider->id . '/edit')->assertOk();
        $this->assertDatabaseHas('riders', ['name' => 'Changed Name']);
    }

    /** @test */
    public function a_user_can_delete_a_rider()
    {
        $this->actingAs(factory(User::class)->create());
        $rider = factory(Rider::class)->create();

        $this->delete('/admin/riders/' . $rider->id)
            ->assertRedirect('/admin/riders');
        $this->get('/admin/riders/' . $rider->id . '/edit')->assertNotFound();
        $this->assertDatabaseMissing('riders', $rider->toArray());
    }

    /** @test */
    public function a_rider_requires_a_name()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = factory(Rider::class)->raw(['name' => '']);
        $this->post('/admin/riders', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_rider_requires_a_team()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = factory(Rider::class)->raw(['team_id' => '']);
        $this->post('/admin/riders', $attributes)->assertSessionHasErrors('team_id');
    }

    /** @test */
    public function a_rider_requires_a_bike()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = factory(Rider::class)->raw(['bike_id' => '']);
        $this->post('/admin/riders', $attributes)->assertSessionHasErrors('bike_id');
    }

    /** @test */
    public function a_rider_requires_a_country()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = factory(Rider::class)->raw(['country_id' => '']);
        $this->post('/admin/riders', $attributes)->assertSessionHasErrors('country_id');
    }

    /** @test */
    public function a_rider_requires_a_racing_number()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = factory(Rider::class)->raw(['racing_number' => '']);
        $this->post('/admin/riders', $attributes)->assertSessionHasErrors('racing_number');
    }

    /** @test */
    public function a_rider_requires_an_age()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = factory(Rider::class)->raw(['age' => '']);
        $this->post('/admin/riders', $attributes)->assertSessionHasErrors('age');
    }
}
