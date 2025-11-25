<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'category' => $this->faker->word(),
            'year' => $this->faker->year(),
            'isbn' => $this->faker->isbn13(),
            'description' => $this->faker->paragraph(),
            'cover_image' => $this->faker->imageUrl(200, 300, 'books'),
            'available_copies' => $this->faker->numberBetween(0, 10),
        ];
    }
}
