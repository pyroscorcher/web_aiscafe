@extends('layouts.admin')

@section('content')
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id_product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="product_name" value="{{ $product->product_name }}" required><br>

        <label>Price:</label>
        <input type="number" name="price" value="{{ $product->price }}" required><br>

        <label>Description:</label>
        <textarea name="description">{{ $product->description }}</textarea><br>

        <label>Photo:</label>
        <input type="file" name="photo_product"><br>
        @if($product->photo_product)
            <img src="{{ asset('storage/'.$product->photo_product) }}" width="80">
        @endif

        <button type="submit">Update</button>
    </form>
@endsection
