@extends('layouts.admin')

@section('content')
<h1>Add Review</h1>
<form action="{{ route('reviews.store') }}" method="POST">
    @csrf
    <label>Name:</label>
    <input type="text" name="name_review" required><br>
    <label>Comment:</label>
    <textarea name="comment" required></textarea><br>
    <label>Rate:</label>
    <select name="rate" required>
        <option value="1">1 ⭐</option>
        <option value="2">2 ⭐⭐</option>
        <option value="3">3 ⭐⭐⭐</option>
        <option value="4">4 ⭐⭐⭐⭐</option>
        <option value="5">5 ⭐⭐⭐⭐⭐</option>
    </select><br>
    <button type="submit">Save</button>
</form>
@endsection
