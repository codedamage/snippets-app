<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }
    public function test_api_avalability()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('/api/snippets');
        $response->assertStatus(200);
    }
}
