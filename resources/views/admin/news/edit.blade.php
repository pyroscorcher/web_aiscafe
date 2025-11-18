@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">

    <h1 class="text-2xl font-bold mb-6">Edit News</h1>

    <form action="{{ route('news.update', $news->id_news) }}" method="POST"
          enctype="multipart/form-data" class="space-y-5">

        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ $news->title }}"
                class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>
        </div>

        {{-- Content --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" rows="5"
                class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>{{ $news->content }}</textarea>
        </div>

        {{-- Date --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" name="date"
                value="{{ $news->date }}"
                class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>
        </div>

        {{-- Photo Upload --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">New Photo (optional)</label>
            <input type="file" name="photo_news"
                class="w-full border-gray-300 rounded-md shadow-sm mt-1">

            @if ($news->photo_news)
                <div class="mt-3">
                    <p class="text-sm text-gray-600 mb-1">Current Photo:</p>
                    <img src="{{ asset('storage/'.$news->photo_news) }}"
                         class="h-24 w-24 object-cover rounded-lg shadow">
                </div>
            @endif
        </div>

        {{-- Update Button --}}
        <button type="submit"
            class="px-5 py-2 bg-blue-600 text-white rounded font-medium hover:bg-blue-700">
            Update
        </button>

    </form>
</div>
@endsection
