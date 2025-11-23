<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'category' => 'Fiction',
                'year' => 1925,
                'available_copies' => 3,
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'category' => 'Dystopian',
                'year' => 1949,
                'available_copies' => 5,
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'category' => 'Fiction',
                'year' => 1960,
                'available_copies' => 4,
            ],
        ]);
    }
}
