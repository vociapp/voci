<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    public function test_home(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_decks(): void
    {
        $response = $this->get('/decks');

        $response->assertStatus(200);
    }
}
