@extends('layouts.admin')

@section('title', 'Add Photo')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add New Photo</h1>

<form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
        <label class="block text-sm">Photo Name</label>
        <input type="text" name="photo_name" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label class="block text-sm">Photo</label>
        <input type="file" name="photo" class="w-full border rounded px-3 py-2">
    </div>
    <button type="submit" class="bg-amber-600 text-white px-4 py-2 rounded">Save</button>
</form>
@endsection
