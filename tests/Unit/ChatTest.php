<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ChatTest extends TestCase
{
    public function test_guests_are_redirected_to_the_login_page()
    {
        $response = $this->get('/chat');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_users_can_visit_the_chat()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/chat');
        $response->assertStatus(200);
    }
}
