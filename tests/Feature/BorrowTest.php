<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BorrowTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $token;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->token = $this->user->createToken('api-token')->plainTextToken;
    }

    public function test_list_borrows()
    {
        $book = Book::factory()->create(['available_copies' => 2]);
        Borrow::factory()->count(3)->create([
            'user_id' => $this->user->id,
            'book_id' => $book->id,
        ]);

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->getJson('/api/borrows');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_borrow_book()
    {
        $book = Book::factory()->create(['available_copies' => 1]);

        $borrowData = [
            'book_id' => $book->id,
            'borrow_date' => now()->toDateString(),
        ];

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->postJson('/api/borrows', $borrowData);

        $response->assertStatus(201)
                 ->assertJsonFragment(['book_id' => $book->id]);

        $this->assertDatabaseHas('borrows', ['book_id' => $book->id, 'user_id' => $this->user->id]);
        $this->assertDatabaseHas('books', ['id' => $book->id, 'available_copies' => 0]);
    }

    public function test_return_book()
    {
        $book = Book::factory()->create(['available_copies' => 0]);

        $borrow = Borrow::factory()->create([
            'user_id' => $this->user->id,
            'book_id' => $book->id,
            'borrow_date' => now()->subDays(5)->toDateString(),
            'status' => 'borrowed',
        ]);

        $updateData = [
            'return_date' => now()->toDateString(),
            'status' => 'returned',
        ];

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->putJson("/api/borrows/{$borrow->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment(['status' => 'returned']);
        $this->assertDatabaseHas('borrows', ['id' => $borrow->id, 'status' => 'returned']);
        $this->assertDatabaseHas('books', ['id' => $book->id, 'available_copies' => 1]);
    }
}
