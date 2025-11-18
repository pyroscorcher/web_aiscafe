@extends('layouts.admin')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manage Reviews</h1>
        <a href="{{ route('reviews.create') }}"
           class="px-4 py-2 bg-amber-600 text-white rounded hover:bg-amber-700">
            + Add Review
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-gray-700">Name</th>
                    <th class="px-4 py-3 text-left text-gray-700">Comment</th>
                    <th class="px-4 py-3 text-left text-gray-700">Rating</th>
                    <th class="px-4 py-3 text-left text-gray-700">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($reviews as $review)
                <tr class="border-b">
                    <td class="px-4 py-3">{{ $review->name_review }}</td>

                    <td class="px-4 py-3">{{ $review->comment }}</td>

                    <td class="px-4 py-3">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rate)
                                <span class="text-yellow-500">⭐</span>
                            @else
                                <span class="text-gray-300">☆</span>
                            @endif
                        @endfor
                    </td>

                    <td class="px-4 py-3 flex gap-3">
                        <a href="{{ route('reviews.edit', $review->id_review) }}"
                           class="text-blue-600 hover:underline">Edit</a>

                        <form action="{{ route('reviews.destroy', $review->id_review) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this review?');">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@endsection
