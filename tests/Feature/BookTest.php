<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
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

    public function test_list_books()
    {
        Book::factory()->count(3)->create();

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->getJson('/api/books');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    public function test_create_book()
    {
        $bookData = [
            'title' => 'Test Book',
            'author' => 'Test Author',
            'category' => 'Test Category',
            'year' => 2023,
            'available_copies' => 5,
        ];

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->postJson('/api/books', $bookData);

        $response->assertStatus(201)
                 ->assertJsonFragment(['title' => 'Test Book']);
        $this->assertDatabaseHas('books', ['title' => 'Test Book']);
    }

    public function test_show_book()
    {
        $book = Book::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->getJson("/api/books/{$book->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['id' => $book->id]);
    }

    public function test_update_book()
    {
        $book = Book::factory()->create();

        $updateData = ['title' => 'Updated Title'];

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->putJson("/api/books/{$book->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment(['title' => 'Updated Title']);
        $this->assertDatabaseHas('books', ['title' => 'Updated Title']);
    }

    public function test_delete_book()
    {
        $book = Book::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->deleteJson("/api/books/{$book->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}
