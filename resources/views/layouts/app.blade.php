<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIS Cafe</title>
    <link rel="icon" type="image/png" href="{{ asset('images/LogoAis.png') }}">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>

    <!-- Global Styles -->
    <style>
        .nav-blur {
            backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <!-- ========================= NAVBAR ========================= -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-white/80 nav-blur shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <!-- Logo -->
            <a href="{{ route('landing') }}" class="text-2xl font-bold text-green-800">
                Ais Café
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 font-medium">
                <a href="{{ route('landing') }}" class="hover:text-green-700">Home</a>
                <a href="{{ route('menu') }}" class="hover:text-green-700">Menu</a>
                <a href="{{ route('about') }}" class="hover:text-green-700">Tentang</a>
                <a href="{{ route('artikel') }}" class="hover:text-green-700">Artikel</a>
            </div>

            <!-- Desktop User -->
            <div class="hidden md:flex items-center space-x-4">

                @auth
                    <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-green-700">
                        Profil
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login.form') }}" class="px-4 py-2 bg-green-700 text-white rounded-lg hover:bg-green-800">
                        Login
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button @click="openNav = !openNav" class="md:hidden text-3xl">&#9776;</button>

        </div>

        <!-- Mobile Dropdown -->
        <div x-data="{ openNav: false }">
            <div x-show="openNav" class="md:hidden bg-white shadow-lg px-6 py-4 space-y-4">

                <a href="{{ route('landing') }}" class="block">Home</a>
                <a href="{{ route('menu') }}" class="block">Menu</a>
                <a href="{{ route('about') }}" class="block">Tentang</a>
                <a href="{{ route('artikel') }}" class="block">Artikel</a>

                <hr>

                @auth
                    <a href="{{ route('profile.edit') }}" class="block">Profil</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="w-full mt-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login.form') }}" class="block px-4 py-2 bg-green-700 text-white rounded-lg text-center">
                        Login
                    </a>
                @endauth

            </div>
        </div>
    </nav>

    <!-- Spacer for Fixed Navbar -->
    <div class="h-24"></div>


    <!-- ========================= PAGE CONTENT ========================= -->
    <main class="flex-grow">
        @yield('content')
    </main>


    <!-- ========================= FOOTER ========================= -->
    <footer class="bg-green-900 text-white py-10 mt-20">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">

            <div>
                <h3 class="font-bold text-lg mb-3">Ais Café</h3>
                <p class="text-sm">Nikmati cita rasa terbaik dari kopi pilihan kami.</p>
            </div>

            <div>
                <h3 class="font-bold text-lg mb-3">Navigasi</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('menu') }}" class="hover:text-green-300">Menu</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-green-300">Tentang</a></li>
                    <li><a href="{{ route('artikel') }}" class="hover:text-green-300">Artikel</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-lg mb-3">Kontak</h3>
                <p class="text-sm">Email: support@aiscafe.com</p>
                <p class="text-sm">Instagram: @aiscafe</p>
            </div>

        </div>
    </footer>

    <!-- ========================= GLOBAL LOADING SCREEN ========================= -->
    <div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-[9999] hidden">
        <img src="{{ asset('images/loading.gif') }}" alt="Loading..." class="w-24 h-24">
    </div>

    <!-- Global Loading Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const forms = document.querySelectorAll("form");

            forms.forEach(form => {
                form.addEventListener("submit", function () {
                    document.getElementById("loadingOverlay").classList.remove("hidden");
                });
            });
        });

        // Show loader on page navigation
        window.addEventListener("beforeunload", function () {
            document.getElementById("loadingOverlay").classList.remove("hidden");
        });
    </script>

</body>
</html>
