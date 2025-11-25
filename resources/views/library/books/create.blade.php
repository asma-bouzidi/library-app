@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-lg">
    <h1 class="text-3xl font-bold mb-6">Add New Book</h1>

    <form action="{{ route('books.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="title" class="block font-semibold mb-1">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-600">
            @error('title')
                <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="author" class="block font-semibold mb-1">Author</label>
            <input type="text" name="author" id="author" value="{{ old('author') }}" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-600">
            @error('author')
                <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category" class="block font-semibold mb-1">Category</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-600">
            @error('category')
                <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="year" class="block font-semibold mb-1">Year</label>
            <input type="number" name="year" id="year" value="{{ old('year') }}" required min="0"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-600">
            @error('year')
                <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="available_copies" class="block font-semibold mb-1">Available Copies</label>
            <input type="number" name="available_copies" id="available_copies" value="{{ old('available_copies') }}" required min="0"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-600">
            @error('available_copies')
                <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded">
                Save Book
            </button>
            <a href="{{ route('books.index') }}" 
               class="inline-flex items-center px-6 py-2 border border-gray-300 rounded text-gray-700 hover:text-red-600 hover:border-red-600">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
