<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $book;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->book = Book::factory()->create([
            'available_copies' => 0,
        ]);
    }

    /** @test */
    public function user_can_list_their_reservations()
    {
        Reservation::factory()->create([
            'user_id' => $this->user->id,
            'book_id' => $this->book->id,
            'status'  => 'active',
        ]);

        $response = $this->actingAs($this->user, 'sanctum')->getJson('/api/reservations');

        $response->assertStatus(200)
                 ->assertJsonFragment(['book_id' => $this->book->id]);
    }

    /** @test */
    public function user_can_create_a_reservation()
    {
        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/reservations', [
            'book_id' => $this->book->id,
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'user_id' => $this->user->id,
                     'book_id' => $this->book->id,
                     'status'  => 'active',
                 ]);
    }

    /** @test */
    public function user_cannot_create_duplicate_active_reservations()
    {
        Reservation::factory()->create([
            'user_id' => $this->user->id,
            'book_id' => $this->book->id,
            'status'  => 'active',
        ]);

        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/reservations', [
            'book_id' => $this->book->id,
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors('book_id');
    }

    /** @test */
    public function user_can_cancel_a_reservation()
    {
        $reservation = Reservation::factory()->create([
            'user_id' => $this->user->id,
            'book_id' => $this->book->id,
            'status'  => 'active',
        ]);

        $response = $this->actingAs($this->user, 'sanctum')->deleteJson("/api/reservations/{$reservation->id}");

        $response->assertStatus(204);

        $this->assertDatabaseHas('reservations', [
            'id' => $reservation->id,
            'status' => 'cancelled',
        ]);
    }
}
