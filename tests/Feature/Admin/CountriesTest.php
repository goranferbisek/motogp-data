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

        $attributes = [
            'name' => $this->faker->unique()->country
        ];

        $this->post('/admin/countries', $attributes)->assertRedirect('/admin/countries');

        $this->assertDatabaseHas('countries', $attributes);

        $this->get('/admin/countries')->assertSee($attributes['name']);
    }

    /** @test */
    public function a_user_can_edit_a_country()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create());

        $country = factory(Country::class)->create();

        // can you see edit form - assert see country name
        $this->get('/admin/countries/' . $country->id . '/edit')
            ->assertSee($country->name);

        // change attrbiutes and assert redirect


        // assert database see
    }
}
