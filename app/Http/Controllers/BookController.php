<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::query()
            ->when(!blank($request->search), function ($query) use ($request) {
                return $query
                    ->where('name', 'like', '%' . $request->search . '%')
                    ->orWhereHas('author', function ($authorQuery) use ($request) {
                        $authorQuery->where('name', 'like', '%' . $request->search . '%');
                    });
            })
            ->latest()
            ->paginate(10);
        $authors    = Author::all();

        return view('book.index', compact('books','authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request, BookService $bookService)
    {
        return $bookService->create($request)
        ? back()->with('success', 'Book has been created successfully!')
        : back()->with('failed', 'Book was not created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book, BookService $bookService)
    {
        return $bookService->update($request, $book)
            ? back()->with('success', 'Author has been updated successfully!')
            : back()->with('failed', 'Author was not updated successfully!');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        return $book->delete()
        ? back()->with('success', 'Route has been deleted successfully!')
        : back()->with('failed', 'Route was not deleted successfully!');
    }
}
