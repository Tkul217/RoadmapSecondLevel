<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_show_users_page(): void
    {
        $this->actingAs(User::find(1));

        $response = $this->get(route('users.index'));

        $response->assertSuccessful();

        $response->assertViewIs('users.index');
    }

    public function test_show_user_page(): void
    {
        $this->actingAs(User::find(1));

        $response = $this->get(route('users.show', 2));

        $response->assertSuccessful();

        $response->assertViewIs('users.show');
    }
}
