<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    // Show the list of books
    public function booksIndex(Request $request)
    {
        // Get query parameters for filtering
        $query = Book::query();

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        if ($request->has('author')) {
            $query->where('author', 'like', '%' . $request->input('author') . '%');
        }

        if ($request->has('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->has('year')) {
            $query->where('year', $request->input('year'));
        }

        // Paginate the results, default 10 per page
        $books = $query->paginate(10);

        return view('library.books.index', compact('books'));
    }

    // Show form to create a new book
    public function bookCreate()
    {
        return view('library.books.create');
    }

    // Show form to edit a book
    public function bookEdit($id)
    {
        $book = Book::findOrFail($id);
        return view('library.books.edit', compact('book', 'id'));
    }
}
