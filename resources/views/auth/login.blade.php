@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-md">
    <h1 class="text-3xl font-bold mb-6">Login</h1>

    <form action="{{ route('login') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-600">
            @error('email')
                <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block font-semibold mb-1">Password</label>
            <input type="password" name="password" id="password" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-600">
            @error('password')
                <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded">
                Login
            </button>
            <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-2 border border-gray-300 rounded text-gray-700 hover:text-red-600 hover:border-red-600">
                Register
            </a>
        </div>
    </form>
</div>
@endsection
