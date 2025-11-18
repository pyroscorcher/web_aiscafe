@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">

    <h1 class="text-2xl font-bold mb-6">Edit Review</h1>

    <form action="{{ route('reviews.update', $review->id_review) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name_review" value="{{ $review->name_review }}"
                class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>
        </div>

        {{-- Comment --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Comment</label>
            <textarea name="comment" rows="4"
                class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>{{ $review->comment }}</textarea>
        </div>

        {{-- Rate --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Rating</label>
            <select name="rate"
                class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $review->rate == $i ? 'selected' : '' }}>
                        {{ $i }} {{ str_repeat('⭐', $i) }}
                    </option>
                @endfor
            </select>
        </div>

        <button type="submit"
            class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-medium">
            Update
        </button>

    </form>

</div>
@endsection
