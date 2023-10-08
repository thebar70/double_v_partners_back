<?php

namespace Tests\Feature;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TicketFullRestTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    /**
     * A basic feature test example.
     */
    public function test_can_list_the_tickets(): void
    {
        $this->authUser();

        $response = $this->get('/api/v1/tickets/list');

        $response->assertOk();
    }

    public function test_can_register_a_new_ticket()
    {
        $this->authUser();

        $response = $this->post('/api/v1/tickets/create', ['description' => 'test']);

        $response->assertStatus(200);
    }

    public function test_can_not_register_a_new_ticket_by_error_in_data()
    {
        $this->authUser();

        $response = $this->json('POST', '/api/v1/tickets/create', ['descriptio' => 'test']);

        $response->assertStatus(422);
    }

    public function test_can_retrive_tickets_data_by_graphQL()
    {
        $this->authUser();

        Ticket::factory(10)->create([
            'description' => 'Test description'
        ]);

        $response = $this->graphql("{getTickes { status } }");

        $this->assertEquals(
            "open",
            $response->json("data.getTickes.0.status")
        );
    }


    public function authUser()
    {
        if ($this->user) return true;

        $this->user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Auth::login($this->user);
    }

    public function graphql(string $query)
    {
        return $this->post('/graphql', [
            'query' => $query
        ]);
    }
}
