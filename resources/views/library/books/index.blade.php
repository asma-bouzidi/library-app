@extends('layouts.app_modern')

@section('content')
<div class="bg-white p-8 rounded-2xl shadow">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-serif">Books</h2>
        <button class="btn-dark">+ Add Book</button>
    </div>

    <table class="w-full text-left">
        <thead>
            <tr class="border-b">
                <th class="py-3">Title</th>
                <th class="py-3">Author</th>
                <th class="py-3">Year</th>
                <th class="py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3">{{ $book->title }}</td>
                    <td class="py-3">{{ $book->author }}</td>
                    <td class="py-3">{{ $book->year }}</td>
                    <td class="py-3 flex gap-3">
                        <a href="{{ route('books.edit', $book->id) }}" class="btn-outline">Edit</a>
                        <form method="POST" action="{{ route('books.destroy', $book) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-dark" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
