@extends('layouts.admin')

@section('content')
    <h2>Add Product</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="product_name" required><br>

        <label>Price:</label>
        <input type="number" name="price" required><br>

        <label>Description:</label>
        <textarea name="description"></textarea><br>

        <label>Photo:</label>
        <input type="file" name="photo_product"><br>

        <button type="submit">Save</button>
    </form>
@endsection
