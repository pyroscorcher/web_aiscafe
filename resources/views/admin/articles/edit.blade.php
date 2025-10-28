@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Article</h1>

    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ $article->title }}" class="w-full border border-gray-300 rounded-lg p-2" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" rows="6" class="w-full border border-gray-300 rounded-lg p-2" required>{{ $article->content }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" name="date" value="{{ $article->date }}" class="w-full border border-gray-300 rounded-lg p-2" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Photo</label>
            @if($article->photo)
                <img src="{{ asset('storage/' . $article->photo) }}" alt="Article photo" class="w-32 h-32 object-cover rounded mb-2">
            @endif
            <input type="file" name="photo" class="w-full border border-gray-300 rounded-lg p-2">
        </div>

        <button type="submit" class="bg-amber-600 text-white px-4 py-2 rounded-lg shadow hover:bg-amber-700">Update</button>
    </form>
</div>
@endsection
