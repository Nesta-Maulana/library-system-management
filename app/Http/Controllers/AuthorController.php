<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use App\Services\AuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = Author::query()
            ->when(!blank($request->search), function ($query) use ($request) {
                return $query
                    ->where('name', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('author.index', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request, AuthorService $authorService)
    {
        return $authorService->create($request)
            ? back()->with('success', 'Author has been created successfully!')
            : back()->with('failed', 'Author was not created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author, AuthorService $authorService)
    {
        return $authorService->update($request, $author)
            ? back()->with('success', 'Author has been updated successfully!')
            : back()->with('failed', 'Author was not updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        return $author->delete()
            ? back()->with('success', 'Route has been deleted successfully!')
            : back()->with('failed', 'Route was not deleted successfully!');
    }
}
