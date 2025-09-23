@extends('layouts.admin')

@section('content')
<h1>Edit Review</h1>
<form action="{{ route('reviews.update', $review->id_review) }}" method="POST">
    @csrf @method('PUT')
    <label>Name:</label>
    <input type="text" name="name_review" value="{{ $review->name_review }}" required><br>
    <label>Comment:</label>
    <textarea name="comment" required>{{ $review->comment }}</textarea><br>
    <label>Rate:</label>
    <select name="rate" required>
        @for ($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}" {{ $review->rate == $i ? 'selected' : '' }}>
                {{ $i }} {{ str_repeat('⭐', $i) }}
            </option>
        @endfor
    </select><br>
    <button type="submit">Update</button>
</form>
@endsection
