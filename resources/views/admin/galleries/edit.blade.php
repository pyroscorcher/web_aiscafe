@extends('layouts.admin')

@section('title', 'Edit Photo')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Photo</h1>

<form action="{{ route('galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf @method('PUT')
    <div>
        <label class="block text-sm">Photo Name</label>
        <input type="text" name="photo_name" value="{{ $gallery->photo_name }}" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block text-sm">Current Photo</label>
        <img src="{{ asset('storage/' . $gallery->photo) }}" alt="{{ $gallery->photo_name }}" class="h-24 mb-2">
        <input type="file" name="photo" class="w-full border rounded px-3 py-2">
    </div>
    <button type="submit" class="bg-amber-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
