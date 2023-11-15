<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua author yang sudah ada
        $authors = Author::all();

        // Data contoh
        $books = [];

        foreach ($authors as $author) {
            for ($i = 1; $i <= 2; $i++) {
                $books[] = [
                    'name' => 'Book ' . $i . ' by ' . $author->name,
                    'description' => 'Description for Book ' . $i,
                    'author_id' => $author->id,
                ];
            }
        }

        // Tambahkan data ke tabel
        Book::insert($books);
    }
}
