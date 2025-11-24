<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ReservationController extends Controller
{
    // List all reservations for authenticated user
    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::with('book')->where('user_id', $user->id)->get();

        return response()->json($reservations, 200);
    }

    // Create a new reservation
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $book = Book::findOrFail($request->book_id);

        // Check if user already has an active reservation for this book
        $existingReservation = Reservation::where('user_id', $user->id)
            ->where('book_id', $book->id)
            ->where('status', 'active')->first();

        if ($existingReservation) {
            throw ValidationException::withMessages([
                'book_id' => ['You already have an active reservation for this book.'],
            ]);
        }

        // Optional: Check if the book is available for borrow; if yes, suggest borrowing instead
        if ($book->available_copies > 0) {
            throw ValidationException::withMessages([
                'book_id' => ['Book has available copies. Consider borrowing instead of reserving.'],
            ]);
        }

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'status'  => 'active',
        ]);

        return response()->json($reservation, 201);
    }

    // Cancel a reservation
    public function destroy($id)
    {
        $user = Auth::user();

        $reservation = Reservation::where('user_id', $user->id)
            ->where('id', $id)
            ->where('status', 'active')
            ->firstOrFail();

        $reservation->update(['status' => 'cancelled']);

        return response()->json(null, 204);
    }
}
