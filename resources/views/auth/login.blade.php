<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ais Cafe - Login</title>
    @vite(['resources/css/app.css', 'resources/js/login.js'])
</head>
<body class="bg-white min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- Top-half background image -->
    <div class="absolute top-0 left-0 w-full h-1/2 bg-cover bg-center"  
        style="background-image: url('{{ asset('images/LoginImage.JPG') }}');">
    </div>  

    <!-- Top left logo -->
    <div class="absolute top-6 left-6 flex items-center space-x-2">
        <div class="flex flex-col items-center mb-4">
            <img src="{{ asset('images/LogoAis.png') }}" 
                alt="Ais Cafe Logo" 
                class="w-30 h-30 object-contain rounded-full shadow-md">
        </div>
    </div>

    <!-- Login Card -->
    <div class="relative w-full max-w-md h-[420px] overflow-y-auto bg-white shadow-2xl rounded-3xl p-6 z-10">
        <!-- Logo -->
        <div class="flex flex-col items-center mb-4">
            <img src="{{ asset('images/LogoAis.png') }}" 
                alt="Ais Cafe Logo" 
                class="w-30 h-30 object-contain rounded-full shadow-md">
        </div>


        <h2 class="text-center text-lg font-semibold text-gray-700 mb-4">Sign In</h2>

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

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-amber-500 focus:border-amber-500"
                />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-amber-500 focus:border-amber-500 pr-10">
                    <button type="button" id="togglePassword" 
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-amber-600">
                        👁
                    </button>
                </div>
            </div>

            <button type="submit"
                class="w-full py-2 px-4 bg-green-800 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition">
                Login
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register.form') }}" class="text-green-600 hover:underline font-medium">Daftar</a>
        </p>
    </div>

</body>
</html>
