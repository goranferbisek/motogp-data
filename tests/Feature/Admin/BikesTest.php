<?php

namespace Tests\Feature;

use App\Bike;
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
        $attributes = factory(Bike::class)->raw();

        $this->post('/admin/bikes', $attributes)->assertRedirect('/admin/bikes');
        $this->assertDatabaseHas('bikes', $attributes);
        $this->get('/admin/bikes')->assertSee($attributes['make']);
    }

    /** @test */
    public function a_user_can_edit_a_bike()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());
        $bike = factory(Bike::class)->create();

        $this->get('/admin/bikes/' . $bike->id . '/edit')
            ->assertSee($bike->make);

        $this->put('/admin/bikes/' . $bike->id, $attributes =  [
            'make' => 'Changed'
            ])->assertRedirect('/admin/bikes');

        $this->get('/admin/bikes/' . $bike->id . '/edit')->assertOk();
        $this->assertDatabaseHas('bikes', $attributes);
    }

    /** @test */
    public function a_user_can_delete_a_bike()
    {
        $this->actingAs(factory(User::class)->create());
        $bike = factory(Bike::class)->create();

        $this->delete('/admin/bikes/' . $bike->id)
            ->assertRedirect('/admin/bikes');
        $this->get('/admin/bikes/' . $bike->id . '/edit')->assertNotFound();
        $this->assertDatabaseMissing('bikes', $bike->toArray());
    }


    /** @test */
    public function a_bike_requires_a_name()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = factory(Bike::class)->raw(['make' => '']);
        $this->post('/admin/bikes', [])->assertSessionHasErrors('make');
    }
}
