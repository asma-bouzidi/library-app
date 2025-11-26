@extends('layouts.app')

@section('content')

<div class="bg-white p-8 rounded-2xl shadow">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-serif">Authors</h2>
        <button class="btn-dark">+ Add Author</button>
    </div>

    <table class="w-full text-left">
        <thead>
            <tr class="border-b">
                <th class="py-3">Name</th>
                <th class="py-3">Bio</th>
                <th class="py-3">Actions</th>
            </tr>
        </thead>
        <tbody>

            <tr class="border-b hover:bg-gray-50">
                <td class="py-3">Victor Hugo</td>
                <td class="py-3 text-gray-600">French writer</td>
                <td class="py-3 flex gap-3">
                    <button class="btn-outline">Edit</button>
                    <button class="btn-dark">Delete</button>
                </td>
            </tr>

        </tbody>
    </table>

</div>

@endsection
