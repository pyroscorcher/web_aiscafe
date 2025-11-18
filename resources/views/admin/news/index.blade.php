@extends('layouts.admin')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manage News</h1>

        <a href="{{ route('news.create') }}"
           class="px-4 py-2 bg-amber-600 text-white rounded hover:bg-amber-700">
            + Add News
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-700">Title</th>
                    <th class="px-4 py-2 text-left text-gray-700">Date</th>
                    <th class="px-4 py-2 text-left text-gray-700">Photo</th>
                    <th class="px-4 py-2 text-left text-gray-700">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($news as $item)
                <tr class="border-b">
                    <td class="px-4 py-3">{{ $item->title }}</td>
                    <td class="px-4 py-3">{{ $item->date }}</td>

                    <td class="px-4 py-3">
                        @if ($item->photo_news)
                            <img src="{{ asset('storage/'.$item->photo_news) }}"
                                 class="h-14 w-14 object-cover rounded shadow">
                        @endif
                    </td>

                    <td class="px-4 py-3 flex gap-3">
                        <a href="{{ route('news.edit', $item->id_news) }}"
                           class="text-blue-600 hover:underline">Edit</a>

                        <form action="{{ route('news.destroy', $item->id_news) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this news item?');">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@endsection
