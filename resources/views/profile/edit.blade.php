@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 mt-10">

    <h2 class="text-2xl font-bold mb-4">Edit Profil</h2>

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700 border border-green-300 animate-fade-in">
            <strong>Berhasil!</strong> {{ session('success') }}
        </div>
    @endif

    {{-- Error Alert --}}
    @if ($errors->any())
        <div class="mb-4 p-3 rounded bg-red-100 text-red-600 border border-red-300">
            <ul class="list-disc pl-4 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium">Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}"
                   class="w-full px-3 py-2 border rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                   class="w-full px-3 py-2 border rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                   class="w-full px-3 py-2 border rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Telepon</label>
            <input type="text" name="telp" value="{{ old('telp', $user->telp) }}"
                   class="w-full px-3 py-2 border rounded-lg" required>
        </div>

        <button type="submit"
            class="w-full py-2 px-4 bg-green-800 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md">
            Simpan Perubahan
        </button>
    </form>

    {{-- Back Button --}}
    <div class="mt-6 text-center">
        <a href="{{ route('landing') }}"
           class="inline-block px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition">
            ← Kembali ke Halaman Utama
        </a>
    </div>

</div>

{{-- Fade-in animation --}}
<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fadeIn 0.4s ease-out;
}
</style>
@endsection
