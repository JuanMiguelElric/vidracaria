<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class homeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create(); 

    // Faz login com o usuário de teste
        $this->actingAs($user);

        // Faz uma requisição GET para a rota '/home'
        $response = $this->get('/home');

        $response->assertStatus(200);
    }
}
