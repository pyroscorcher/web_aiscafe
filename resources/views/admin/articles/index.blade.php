@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manage Articles</h1>
        <a href="{{ route('articles.create') }}" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg shadow">
            + New Article
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
        <thead class="bg-gray-200 text-black">
            <tr>
                <th class="px-4 py-2 text-left">Title</th>
                <th class="px-4 py-2 text-left">Date</th>
                <th class="px-4 py-2 text-left">Photo</th>
                <th class="px-4 py-2 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $article->title }}</td>
                    <td class="px-4 py-2">{{ $article->date }}</td>
                    <td class="px-4 py-2">
                        @if($article->photo)
                            <img src="{{ asset('storage/' . $article->photo) }}" alt="Article photo" class="w-16 h-16 object-cover rounded">
                        @else
                            <span class="text-gray-400 italic">No image</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 text-right">
                        <a href="{{ route('articles.edit', $article->id) }}" class="text-amber-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
