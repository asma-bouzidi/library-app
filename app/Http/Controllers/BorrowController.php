<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    // List all borrows for the authenticated user
    public function index()
    {
        $user = Auth::user();
        $borrows = Borrow::with('book')->where('user_id', $user->id)->get();

        return response()->json($borrows, 200);
    }

    // Store a new borrow record
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:borrow_date',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->available_copies < 1) {
            throw ValidationException::withMessages([
                'book_id' => ['No available copies for this book.'],
            ]);
        }

        // Decrement available copies
        $book->decrement('available_copies');

        $borrow = Borrow::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'borrow_date' => $request->borrow_date,
            'due_date' => $request->due_date,
            'return_date' => null,
            'status' => 'borrowed',
            'fine_amount' => 0,
        ]);

        return response()->json($borrow, 201);
    }

    // Show a specific borrow record
    public function show($id)
    {
        $user = Auth::user();
        $borrow = Borrow::with('book')->where('user_id', $user->id)->where('id', $id)->firstOrFail();

        return response()->json($borrow, 200);
    }

    // Update a borrow record to mark return
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $borrow = Borrow::where('user_id', $user->id)->where('id', $id)->firstOrFail();

        $request->validate([
            'return_date' => 'required|date|after_or_equal:borrow_date',
            'status' => 'required|in:borrowed,returned',
        ]);

        if ($borrow->status === 'returned') {
            return response()->json(['message' => 'Book already returned.'], 400);
        }

        if ($request->status === 'returned') {
            // Increment available copies
            $book = Book::findOrFail($borrow->book_id);
            $book->increment('available_copies');

            // Calculate fine if return_date is after due_date
            $fine = 0;
            if ($request->return_date > $borrow->due_date) {
                $daysLate = (strtotime($request->return_date) - strtotime($borrow->due_date)) / (60 * 60 * 24);
                $fine = $daysLate * 1.00; // Example: 1.00 currency unit per day late
            }
            $borrow->fine_amount = $fine;
        }

        $borrow->update([
            'return_date' => $request->return_date,
            'status' => $request->status,
            'fine_amount' => $borrow->fine_amount ?? 0,
        ]);

        return response()->json($borrow, 200);
    }

    // Delete a borrow record
    public function destroy($id)
    {
        $user = Auth::user();
        $borrow = Borrow::where('user_id', $user->id)->where('id', $id)->firstOrFail();

        if ($borrow->status === 'borrowed') {
            // Return the book if borrow record deleted while still borrowed
            $book = Book::findOrFail($borrow->book_id);
            $book->increment('available_copies');
        }

        $borrow->delete();

        return response()->json(null, 204);
    }
}
