<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_show_login_page(): void
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_cannot_view_a_login_form_when_authenticated(): void
    {
        $this->actingAs(User::find(1))->get('/login')->assertRedirect('/');
    }

    public function test_user_can_login_with_correct_data(): void
    {
        $user = User::find(1)->first();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect('/');

        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_password(): void {
        $user = User::find(1)->first();

        $response = $this->from('/login')->post('/login', [
           'email' => $user->email,
           'password' => 'invalid-password'
        ]);

        $response->assertRedirect('/login');

        $response->assertSessionHasErrors('password');

        $this->assertTrue(session()->hasOldInput('email'));

        $this->assertFalse(session()->hasOldInput('password'));

        $this->assertGuest();
    }

    public function test_logout(): void
    {
        $this->actingAs(User::find(1))
            ->post('/logout')
            ->assertRedirect('/login');
        $this->assertGuest();
    }
}
