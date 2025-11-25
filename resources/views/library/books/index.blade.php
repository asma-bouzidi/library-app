@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Books</h1>

    <div class="mb-6">
        <a href="{{ route('books.create') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
            Add New Book
        </a>
    </div>

    <form method="GET" action="{{ route('books.index') }}" class="mb-6 flex flex-wrap gap-4">
        <input type="text" name="title" placeholder="Title" value="{{ request('title') }}" class="border border-gray-300 px-3 py-2 rounded w-48">
        <input type="text" name="author" placeholder="Author" value="{{ request('author') }}" class="border border-gray-300 px-3 py-2 rounded w-48">
        <input type="text" name="category" placeholder="Category" value="{{ request('category') }}" class="border border-gray-300 px-3 py-2 rounded w-48">
        <input type="number" name="year" placeholder="Year" value="{{ request('year') }}" class="border border-gray-300 px-3 py-2 rounded w-24">
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
            Filter
        </button>
        <a href="{{ route('books.index') }}" class="ml-2 text-gray-600 hover:text-red-600">Clear</a>
    </form>

    @if ($books->count())
        <table class="w-full border border-gray-200 rounded">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-700 uppercase text-sm">
                    <th class="p-3 border-b border-gray-200">Title</th>
                    <th class="p-3 border-b border-gray-200">Author</th>
                    <th class="p-3 border-b border-gray-200">Category</th>
                    <th class="p-3 border-b border-gray-200">Year</th>
                    <th class="p-3 border-b border-gray-200">Available Copies</th>
                    <th class="p-3 border-b border-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($books as $book)
                    <tr>
                        <td class="p-3">{{ $book->title }}</td>
                        <td class="p-3">{{ $book->author }}</td>
                        <td class="p-3">{{ $book->category }}</td>
                        <td class="p-3">{{ $book->year }}</td>
                        <td class="p-3">{{ $book->available_copies }}</td>
                        <td class="p-3">
                            <a href="{{ route('books.edit', $book->id) }}" class="text-red-600 hover:text-red-700 font-semibold">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $books->appends(request()->query())->links() }}
        </div>
    @else
        <p>No books found.</p>
    @endif
</div>
@endsection
