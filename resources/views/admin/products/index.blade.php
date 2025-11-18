@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">
    
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Products</h2>
        <a href="{{ route('products.create') }}"
           class="px-4 py-2 bg-green-600 text-white font-medium rounded hover:bg-green-700">
            + Add Product
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-600">Name</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-600">Price</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-600">Description</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-600">Photo</th>
                    <th class="px-4 py-3 text-sm font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach($products as $product)
                <tr>
                    <td class="px-4 py-3">{{ $product->product_name }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="px-4 py-3 text-gray-700">
                        {{ Str::limit($product->description, 40) }}
                    </td>
                    <td class="px-4 py-3">
                        @if($product->photo_product)
                            <img src="{{ asset('storage/'.$product->photo_product) }}" 
                                 class="h-16 w-16 object-cover rounded-md shadow">
                        @else
                            <span class="text-gray-400 text-sm">No Image</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 flex gap-3">

                        {{-- Edit Button --}}
                        <a href="{{ route('products.edit', $product->id_product) }}"
                           class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">
                            Edit
                        </a>

                        {{-- Delete Button --}}
                        <form action="{{ route('products.destroy', $product->id_product) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
