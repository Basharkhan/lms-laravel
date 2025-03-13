<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        Book::insert( [
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'isbn' => '1203669',
                'published_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'isbn' => '45589',
                'published_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'isbn' => '22556',
                'published_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ] );
    }
}
