<?php

namespace Tests\Unit\Models;

use App\Models\Role;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_has_many_roles()
    {
        $user = User::factory()->create();

        $user->roles()->save(
            Role::factory()->make()
        );

        $this->assertInstanceOf(Role::class, $user->roles->first());
    }
}
