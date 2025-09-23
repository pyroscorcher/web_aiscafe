<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ais Cafe - Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white min-h-screen flex items-center justify-center relative overflow-hidden">]

    <!-- Top-half background image -->
    <div class="absolute top-0 left-0 w-full h-1/2 bg-cover bg-center"
         style="background-image: url('{{ asset('images/ayam1.jpeg') }}');">
    </div>

    <!-- Top left logo -->
    <div class="absolute top-6 left-6 flex items-center space-x-2">
        <div class="bg-amber-600 p-2 rounded-full">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                <path d="M12 2L3 7L12 12L21 7L12 2Z"/>
                <path d="M3 17L12 22L21 17"/>
                <path d="M3 12L12 17L21 12"/>
            </svg>
        </div>
        <span class="text-xl font-bold text-amber-800">ais cafe</span>
    </div>

    <!-- Registration Card -->
    <div class="relative w-full max-w-md h-[500px] overflow-y-auto bg-white shadow-2xl rounded-3xl p-6 z8">
        
        <!-- Logo -->
        <div class="flex flex-col items-center mb-6">
            <div class="bg-amber-600 p-3 rounded-full">
                <svg width="25" height="25" viewBox="0 0 24 24" fill="white">
                    <path d="M12 2L3 7L12 12L21 7L12 2Z"/>
                    <path d="M3 17L12 22L21 17"/>
                    <path d="M3 12L12 17L21 12"/>
                </svg>
            </div>
            <h1 class="mt-2 text-2xl font-bold text-amber-800">Ais Cafe</h1>
        </div>

        <!-- Title -->
        <h2 class="text-center text-lg font-semibold text-gray-700 mb-6">Create your account</h2>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-600 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-700 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
                <input type="text" id="username" name="username" required
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-amber-500 focus:border-amber-500">
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
                <input type="text" id="name" name="name" required
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-amber-500 focus:border-amber-500">
            </div>

            <div>
                <label for="telp" class="block text-sm font-medium text-gray-600">Telepon</label>
                <input type="text" id="telp" name="telp" required
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-amber-500 focus:border-amber-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-amber-500 focus:border-amber-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-amber-500 focus:border-amber-500">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-amber-500 focus:border-amber-500">
            </div>

            <button type="submit"
                class="w-full py-2 px-4 bg-amber-600 hover:bg-amber-700 text-white font-semibold rounded-lg shadow-md transition">
                Daftar
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Sudah punya akun? 
            <a href="{{ route('login.form') }}" class="text-amber-600 hover:underline font-medium">Login</a>
        </p>
    </div>

</body>
</html>
