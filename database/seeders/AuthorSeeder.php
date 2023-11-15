<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Data contoh
        $authors = [];

        for ($i = 1; $i <= 20; $i++) {
            $authors[] = [
                'name' => 'Author ' . $i,
                'bio' => 'Bio for Author ' . $i,
            ];
        }

        // Tambahkan data ke tabel
        Author::insert($authors);
    }
}
