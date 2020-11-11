<?php

namespace Tests\Feature\Admin;

use App\Country;
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
        $attributes = factory(Country::class)->raw();

        $this->post('/admin/countries', $attributes)
            ->assertRedirect('/admin/countries');
        $this->assertDatabaseHas('countries', $attributes);
        $this->get('/admin/countries')->assertSee($attributes['name']);
    }

    /** @test */
    public function a_user_can_edit_a_country()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());
        $country = factory(Country::class)->create();

        $this->get('/admin/countries/' . $country->id . '/edit')
            ->assertSee($country->name);

        $this->put('/admin/countries/' . $country->id, $attributes =  [
            'name' => 'Changed'
        ])->assertRedirect('/admin/countries');

        $this->get('/admin/countries/' . $country->id . '/edit')->assertOk();
        $this->assertDatabaseHas('countries', $attributes);
    }

    /** @test */
    public function a_user_can_delete_a_country()
    {
        $this->withExceptionHandling();

        $this->actingAs(factory(User::class)->create());
        $country = factory(Country::class)->create();

        $this->delete('/admin/countries/' . $country->id)
            ->assertRedirect('/admin/countries');
        $this->get('/admin/countries/' . $country->id . '/edit')
            ->assertNotFound();
        $this->assertDatabaseMissing('countries', $country->toArray());
    }
}
