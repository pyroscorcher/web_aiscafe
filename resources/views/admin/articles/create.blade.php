@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4">Add New Article</h2>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-600 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
            <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-600">Content</label>
            <textarea name="content" id="content" rows="5" class="w-full border-gray-300 rounded-md shadow-sm mt-1" required></textarea>
        </div>

        <div>
            <label for="date" class="block text-sm font-medium text-gray-600">Date</label>
            <input type="date" name="date" id="date" class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>
        </div>

        <div>
            <label for="photo" class="block text-sm font-medium text-gray-600">Photo</label>
            <input type="file" name="photo" id="photo" class="w-full border-gray-300 rounded-md shadow-sm mt-1">
        </div>

        <button type="submit" class="px-4 py-2 bg-amber-600 text-white font-medium rounded hover:bg-amber-700">Save</button>
    </form>
</div>
@endsection
