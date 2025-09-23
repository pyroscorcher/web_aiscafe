@extends('layouts.admin')

@section('content')
<h1>Manage News</h1>
<a href="{{ route('news.create') }}">+ Add News</a>
<table border="1" cellpadding="8">
    <tr>
        <th>Title</th>
        <th>Date</th>
        <th>Photo</th>
        <th>Actions</th>
    </tr>
    @foreach($news as $item)
    <tr>
        <td>{{ $item->title }}</td>
        <td>{{ $item->date }}</td>
        <td>
            @if($item->photo_news)
                <img src="{{ asset('storage/'.$item->photo_news) }}" width="80">
            @endif
        </td>
        <td>
            <a href="{{ route('news.edit', $item->id_news) }}">Edit</a> |
            <form action="{{ route('news.destroy', $item->id_news) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
