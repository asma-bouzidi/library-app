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

        $this->user = User::factory()->create([
            'role' => 'admin',
        ]);
        $this->token = $this->user->createToken('api-token')->plainTextToken;
    }

    public function test_list_books()
    {
        Book::factory()->count(3)->create();

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->getJson('/api/books');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data');
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

    public function test_filter_books_by_title()
    {
        Book::factory()->create(['title' => 'The Great Gatsby']);
        Book::factory()->create(['title' => 'Great Expectations']);

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->getJson('/api/books?title=Great');

        $response->assertStatus(200)
                 ->assertJsonCount(2, 'data');
    }

    public function test_filter_books_by_author()
    {
        Book::factory()->create(['author' => 'Jane Austen']);
        Book::factory()->create(['author' => 'Charles Dickens']);

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->getJson('/api/books?author=Jane');

        $response->assertStatus(200)
                 ->assertJsonCount(1, 'data')
                 ->assertJsonFragment(['author' => 'Jane Austen']);
    }

    public function test_filter_books_by_category()
    {
        Book::factory()->create(['category' => 'Fantasy']);
        Book::factory()->create(['category' => 'Science']);

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->getJson('/api/books?category=Fantasy');

        $response->assertStatus(200)
                 ->assertJsonCount(1, 'data')
                 ->assertJsonFragment(['category' => 'Fantasy']);
    }

    public function test_filter_books_by_year()
    {
        Book::factory()->create(['year' => 2000]);
        Book::factory()->create(['year' => 2020]);

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->getJson('/api/books?year=2020');

        $response->assertStatus(200)
                 ->assertJsonCount(1, 'data')
                 ->assertJsonFragment(['year' => 2020]);
    }

    public function test_pagination_of_books()
    {
        Book::factory()->count(30)->create();

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->getJson('/api/books?page=1');

        $response->assertStatus(200);
        $this->assertCount(10, $response->json('data'));

        $response2 = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->getJson('/api/books?page=2');

        $response2->assertStatus(200);
        $this->assertCount(10, $response2->json('data'));

        $response3 = $this->withHeaders([
            'Authorization' => "Bearer {$this->token}",
        ])->getJson('/api/books?page=3');

        $response3->assertStatus(200);
        $this->assertCount(10, $response3->json('data'));
    }
}
