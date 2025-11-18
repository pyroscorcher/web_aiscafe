@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
    
    <h2 class="text-2xl font-bold mb-6">Edit Product</h2>

    <form action="{{ route('products.update', $product->id_product) }}"
          method="POST" enctype="multipart/form-data"
          class="space-y-5">
        
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="product_name"
                   value="{{ $product->product_name }}"
                   class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>
        </div>

        {{-- Price --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" name="price"
                   value="{{ $product->price }}"
                   class="w-full border-gray-300 rounded-md shadow-sm mt-1" required>
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="5"
                      class="w-full border-gray-300 rounded-md shadow-sm mt-1">{{ $product->description }}</textarea>
        </div>

        {{-- Photo Upload --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" name="photo_product"
                   class="w-full border-gray-300 rounded-md shadow-sm mt-1">

            @if($product->photo_product)
                <div class="mt-3">
                    <p class="text-gray-600 text-sm mb-1">Current Image:</p>
                    <img src="{{ asset('storage/'.$product->photo_product) }}"
                         class="h-24 w-24 object-cover rounded-lg shadow">
                </div>
            @endif
        </div>

        {{-- Submit Button --}}
        <button type="submit"
                class="px-5 py-2 bg-blue-600 text-white font-medium rounded hover:bg-blue-700">
            Update Product
        </button>

    </form>
</div>
@endsection
