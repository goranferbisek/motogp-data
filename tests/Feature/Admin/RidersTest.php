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
        $rider = factory(Rider::class)->create();
        $attributes = [
            'name' => $this->faker->firstName . ' ' . $this->faker->Lastname,
            'team_id' => factory(\App\Team::class)->create()->id,
            'bike_id' => factory(\App\Bike::class)->create()->id,
            'country_id' => factory(\App\Country::class)->create()->id,
            'racing_number' => $this->faker->unique()->numberBetween(1, 99),
            'age' => $this->faker->numberBetween(20, 45)
        ];

        $this->post('/admin/riders', $attributes)->assertRedirect('/admin/riders');
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
}
