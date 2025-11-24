<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    // Show the list of books
    public function booksIndex()
    {
        return view('library.books.index');
    }

    // Show form to create a new book
    public function bookCreate()
    {
        return view('library.books.create');
    }

    // Show form to edit a book
    public function bookEdit($id)
    {
        return view('library.books.edit', ['id' => $id]);
    }
}
