<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;
    public function test_it_requires_a_name()
    {
        $this->json('POST', 'api/role')
        ->assertJsonValidationErrors(['name']);
    }

    public function test_it_creates_a_role()
    {
        $this->json('POST', 'api/role', [
            'name' => $name = 'rolename',
        ]);

        $this->assertDatabaseHas('roles', [
            'name' => $name,
        ]);
    }
}
