<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Http\Request;

class BookService
{
    public function create(Request $request): Book
    {
        return Book::create(array_merge(
            $request->validated(),
        ));
    }

    public function update(Request $request, Book $author): Book|bool
    {
        return $author->update(array_merge(
            $request->validated(),
        ));
    }
}
