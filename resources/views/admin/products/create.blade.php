@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4">Add New Product</h2>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-600 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="product_name" class="block text-sm font-medium text-gray-600">Product Name</label>
            <input type="text" name="product_name" id="product_name"
                   class="w-full border-gray-300 rounded-md shadow-md mt-1" required>
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-gray-600">Price</label>
            <input type="number" name="price" id="price"
                   class="w-full border-gray-300 rounded-md shadow-md mt-1" required>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full border-gray-300 rounded-md shadow-md mt-1"></textarea>
        </div>

        <div>
            <label for="photo_product" class="block text-sm font-medium text-gray-600">Photo</label>
            <input type="file" name="photo_product" id="photo_product"
                   class="w-full border-gray-300 rounded-md shadow-sm mt-1">
        </div>

        <button type="submit"
                class="px-4 py-2 bg-amber-600 text-white font-medium rounded hover:bg-amber-700">
            Save
        </button>
    </form>
</div>
@endsection
