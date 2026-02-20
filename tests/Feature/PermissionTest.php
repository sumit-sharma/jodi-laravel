<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use \Illuminate\Foundation\Testing\DatabaseTransactions;

    /**
     * Test access to rm-transfer route with TC role.
     */
    public function test_tc_role_can_access_rm_transfer_route(): void
    {
        // Create a user
        $user = \App\Models\User::factory()->create();

        // Assign TC role
        $user->assignRole('TC');

        // Act as the user
        $response = $this->actingAs($user)->get(route('rm-transfer'));

        // Assert OK status (should fail with 403 currently)
        $response->assertStatus(200);
    }
}
