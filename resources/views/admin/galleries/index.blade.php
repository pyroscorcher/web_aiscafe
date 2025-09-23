@extends('layouts.admin')

@section('title', 'Galleries')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Galleries</h1>
    <a href="{{ route('galleries.create') }}" class="bg-amber-600 text-white px-4 py-2 rounded">Add Photo</a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Photo Name</th>
            <th class="px-4 py-2">Preview</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($galleries as $gallery)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $gallery->id_photo }}</td>
            <td class="px-4 py-2">{{ $gallery->photo_name }}</td>
            <td class="px-4 py-2">
                <img src="{{ asset('storage/' . $gallery->photo) }}" alt="{{ $gallery->photo_name }}" class="h-16">
            </td>
            <td class="px-4 py-2">
                <a href="{{ route('galleries.edit', $gallery) }}" class="text-blue-600">Edit</a> |
                <form action="{{ route('galleries.destroy', $gallery) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
