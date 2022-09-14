<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_requires_an_email()
    {
        $this->json('POST', 'api/user')
        ->assertJsonValidationErrors(['email']);
    }

    public function test_it_requires_a_name()
    {
        $this->json('POST', 'api/user')
        ->assertJsonValidationErrors(['name']);
    }

    public function test_it_returns_validation_error_for_email()
    {
        

        $this->json('POST', 'api/user', [
            'email' => 'noemail',
        ])
            ->assertJsonValidationErrors(['email']);
    }

     public function test_it_creates_a_user()
     {
        $this->json('POST', 'api/user',[
            'name' => $name = 'SomeoneName',
            'email' => $email = 'email@mail.m'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => $name,
            'email' => $email
        ]);

     }

     public function test_it_attaches_the_role_to_the_user()
     {
        $user = User::factory()->create();

        $this->json('POST', "api/user/{$user->id}/roles", [
            'role_id' => ($role = Role::factory()->create())->id
        ]);

        $this->assertDatabaseHas('role_user', [
            'role_id' => $role->id,
            'user_id' => $user->id
        ]);
     }

}