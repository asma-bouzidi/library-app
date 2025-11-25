<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Borrow;
use App\Models\User;
use App\Models\Book;

/**
 * @extends Factory<Borrow>
 */
class BorrowFactory extends Factory
{
    protected $model = Borrow::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'book_id' => Book::factory(),
            'borrow_date' => $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'return_date' => null,
            'status' => 'borrowed',
            'fine_amount' => 0,
        ];
    }
}
