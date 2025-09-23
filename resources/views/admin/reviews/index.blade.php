@extends('layouts.admin')

@section('content')
<h1>Manage Reviews</h1>
<a href="{{ route('reviews.create') }}">+ Add Review</a>
<table border="1" cellpadding="8">
    <tr>
        <th>Name</th>
        <th>Comment</th>
        <th>Rate</th>
        <th>Actions</th>
    </tr>
    @foreach($reviews as $review)
    <tr>
        <td>{{ $review->name_review }}</td>
        <td>{{ $review->comment }}</td>
        <td>
            {{-- Stars for visual representation --}}
            @for ($i = 1; $i <= 5; $i++)
                @if($i <= $review->rate)
                    ⭐
                @else
                    ☆
                @endif
            @endfor
        </td>
        <td>
            <a href="{{ route('reviews.edit', $review->id_review) }}">Edit</a> |
            <form action="{{ route('reviews.destroy', $review->id_review) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
