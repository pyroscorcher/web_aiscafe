@extends('layouts.admin')

@section('content')
    <h2>Products</h2>
    <a href="{{ route('products.create') }}">+ Add Product</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->description }}</td>
            <td>
                @if($product->photo_product)
                    <img src="{{ asset('storage/'.$product->photo_product) }}" width="80">
                @endif
            </td>
            <td>
                <a href="{{ route('products.edit', $product->id_product) }}">Edit</a> |
                <form action="{{ route('products.destroy', $product->id_product) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this product?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
