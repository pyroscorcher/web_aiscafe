@extends('layouts.admin')

@section('content')
<h1>Edit News</h1>
<form action="{{ route('news.update', $news->id_news) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <label>Title:</label>
    <input type="text" name="title" value="{{ $news->title }}" required><br>
    <label>Content:</label>
    <textarea name="content" required>{{ $news->content }}</textarea><br>
    <label>Date:</label>
    <input type="date" name="date" value="{{ $news->date }}" required><br>
    <label>Photo:</label>
    <input type="file" name="photo_news"><br>
    @if($news->photo_news)
        <img src="{{ asset('storage/'.$news->photo_news) }}" width="100"><br>
    @endif
    <button type="submit">Update</button>
</form>
@endsection
