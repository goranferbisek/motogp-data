<?php

namespace Tests\Feature\Admin;

use App\Country;
use App\Track;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TracksTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_track()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());
        $track = factory(Track::class)->create();
        $attributes = [
            'country_id' => factory(Country::class)->create()->id,
            'name' => $this->faker->state .' raceway' . ' ' . $this->faker->country,
            'length' => $this->faker->numberBetween(3500, 4500)
        ];

        $this->post('/admin/tracks', $attributes)
            ->assertRedirect('/admin/tracks');
        $this->assertDatabaseHas('tracks', $attributes);
        $this->get('/admin/tracks')->assertSee($attributes['name']);
    }

    /** @test */
    public function a_user_can_edit_a_track()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());
        $track = factory(Track::class)->create();

        $this->get('/admin/tracks/' . $track->id . '/edit')
            ->assertSee($track->name);

        $attributes = $track->toArray();
        $attributes['name'] = 'Changed track name';

        $this->put('/admin/tracks/' . $track->id, $attributes)
            ->assertRedirect('/admin/tracks');
        $this->get('/admin/tracks/' . $track->id . '/edit')->assertOk();
        $this->assertDatabaseHas('tracks', ['name' => 'Changed track name']);
    }

    /** @test */
    public function a_user_can_delete_a_track()
    {
        $this->actingAs(factory(User::class)->create());
        $track = factory(Track::class)->create();

        $this->delete('admin/tracks/' . $track->id)
            ->assertRedirect('/admin/tracks');
        $this->get('/admin/riders/' . $track->id . '/edit')->assertNotFound();
        $this->assertDatabaseMissing('tracks', $track->toArray());
    }
}
