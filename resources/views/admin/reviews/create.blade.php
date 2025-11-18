@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">

    <h1 class="text-2xl font-bold mb-6">Add Review</h1>

    <form action="{{ route('reviews.store') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Name --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name_review"
                class="w-full border-gray-300 rounded-md shadow-md mt-1" required>
        </div>

        {{-- Comment --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Comment</label>
            <textarea name="comment" rows="4"
                class="w-full border-gray-300 rounded-md shadow-md mt-1" required></textarea>
        </div>

        {{-- Rate --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Rating</label>
            <select name="rate"
                class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>
                <option value="1">1 ⭐</option>
                <option value="2">2 ⭐⭐</option>
                <option value="3">3 ⭐⭐⭐</option>
                <option value="4">4 ⭐⭐⭐⭐</option>
                <option value="5">5 ⭐⭐⭐⭐⭐</option>
            </select>
        </div>

        <button type="submit"
            class="px-5 py-2 bg-amber-600 text-white rounded hover:bg-amber-700 font-medium">
            Save
        </button>
    </form>

</div>
@endsection
