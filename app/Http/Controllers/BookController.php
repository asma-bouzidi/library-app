<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // List all books
    public function index()
    {
        return response()->json(Book::all(), 200);
    }

    // Store a new book record
    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'author'         => 'required|string|max:255',
            'category'       => 'required|string|max:255',
            'year'           => 'required|digits:4|integer',
            'available_copies' => 'required|integer|min:0',
        ]);

        $book = Book::create($request->all());

        return response()->json($book, 201);
    }

    // View a specific book
    public function show(Book $book)
    {
        return response()->json($book, 200);
    }

    // Update a book record
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title'          => 'sometimes|required|string|max:255',
            'author'         => 'sometimes|required|string|max:255',
            'category'       => 'sometimes|required|string|max:255',
            'year'           => 'sometimes|required|digits:4|integer',
            'available_copies' => 'sometimes|required|integer|min:0',
        ]);

        $book->update($request->all());

        return response()->json($book, 200);
    }

    // Delete a book
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json(null, 204);
    }
}
