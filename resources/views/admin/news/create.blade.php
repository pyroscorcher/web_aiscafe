@extends('layouts.admin')

@section('content')
<h1>Add News</h1>
<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Title:</label>
    <input type="text" name="title" required><br>
    <label>Content:</label>
    <textarea name="content" required></textarea><br>
    <label>Date:</label>
    <input type="date" name="date" required><br>
    <label>Photo:</label>
    <input type="file" name="photo_news"><br>
    <button type="submit">Save</button>
</form>
@endsection
