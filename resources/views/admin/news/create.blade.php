@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">

    <h1 class="text-2xl font-bold mb-6">Add News</h1>

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        {{-- Title --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title"
                class="w-full border-gray-300 rounded-md shadow-md mt-1" required>
        </div>

        {{-- Content --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" rows="5"
                class="w-full border-gray-300 rounded-md shadow-md mt-1" required></textarea>
        </div>

        {{-- Date --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" name="date"
                class="w-full border-gray-300 rounded-md shadow-md mt-1" required>
        </div>

        {{-- Photo --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" name="photo_news"
                class="w-full border-gray-300 rounded-md shadow-sm mt-1">
        </div>

        {{-- Save --}}
        <button type="submit"
            class="px-5 py-2 bg-amber-600 text-white rounded font-medium hover:bg-amber-700">
            Save
        </button>

    </form>
</div>
@endsection
