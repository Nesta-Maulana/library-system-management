<?php

namespace App\Services;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorService
{
    public function create(Request $request): Author
    {
        return Author::create(array_merge(
            $request->validated(),
        ));
    }

    public function update(Request $request, Author $author): Author|bool
    {
        return $author->update(array_merge(
            $request->validated(),
        ));
    }
}
