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
        $attributes = factory(Rider::class)->create()->attributesToArray();

        $this->post('/admin/riders', $attributes)->assertRedirect('/admin/bikes');
        $this->assertDatabaseHas('bikes', $attributes);
        $this->get('/admin/bikes')->assertSee($attributes['make']);
    }
}
