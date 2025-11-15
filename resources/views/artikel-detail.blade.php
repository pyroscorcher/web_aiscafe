<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;600&display=swap');
        .font-display { font-family: 'Poppins'; }
        .font-body { font-family: 'Poppins'; }
        .hero-gradient {
            background: linear-gradient(135deg, #2d1b00 0%, #5c3a1e 50%, #8b5a3c 100%);
        }
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="font-body bg-stone-50">
    <!-- Nav Section -->
    <nav x-data="{ open: false }" class="fixed w-full bg-white/95 backdrop-blur-sm shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center h-16 relative">

                <!-- Left: Logo -->
                <div class="flex items-center h-full">
                    <img src="{{ asset('images/LogoAis.png') }}" 
                        alt="Ais Cafe Logo" 
                        class="h-12 w-auto object-contain">
                </div>

                <!-- Center: Menu (desktop only) -->
                <div class="hidden md:flex space-x-8 absolute left-1/2 -translate-x-1/2">
                    <a href="{{ route('landing') }}" class="text-gray-700 hover:text-green-700 transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-700 transition">About</a>
                    <a href="{{ route('menu') }}" class="text-gray-700 hover:text-green-700 transition">Menu</a>
                    <a href="{{ route('artikel') }}" class="text-green-700 hover:text-green-700 transition">Artikel</a>
                </div>

                <!-- Right side: Profile icon + Logout (desktop) -->
                <div class="hidden md:flex items-center space-x-3 ml-auto">

                    @auth
                        @php
                            $destination = Auth::user()->role === 'admin'
                                ? route('admin.dashboard')
                                : route('profile.edit');
                        @endphp

                        <!-- Profile Icon -->
                        <a href="{{ $destination }}" 
                        class="inline-flex items-center justify-center bg-green-900 text-white w-12 h-12 rounded-full hover:bg-green-800 transition">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 1115 0v.75H4.5v-.75z" />
                            </svg>
                        </a>

                        <!-- Logout -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-500 transition">
                                Logout
                            </button>
                        </form>

                    @else
                        <a href="{{ route('login') }}" 
                        class="inline-block bg-green-900 text-white px-6 py-3 rounded-full hover:bg-green-800 transition">
                            Login
                        </a>
                    @endauth
                </div>

                <!-- 🍔 Mobile Menu Button -->
                <button @click="open = !open" 
                    class="md:hidden ml-auto focus:outline-none transition p-2 rounded-lg hover:bg-gray-100">

                    <!-- Icon changes -->
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8 text-green-900" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8 text-green-900" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>
        </div>

        <!-- 📱 Mobile Menu Dropdown -->
        <div x-show="open" x-transition.origin.top class="md:hidden bg-white border-t border-gray-200 shadow-sm">
            <div class="px-4 py-4 space-y-4">

                <a href="{{ route('landing') }}" class="block text-gray-800 hover:text-green-700">Home</a>
                <a href="{{ route('about') }}" class="block text-gray-800 hover:text-green-700">About</a>
                <a href="{{ route('menu') }}" class="block text-gray-800 hover:text-green-700">Menu</a>
                <a href="{{ route('artikel') }}" class="block text-green-800 hover:text-green-700">Artikel</a>

                @auth
                    @php
                        $destination = Auth::user()->role === 'admin'
                            ? route('admin.dashboard')
                            : route('profile.edit');
                    @endphp

                    <!-- Profile -->
                    <a href="{{ $destination }}"
                        class="flex items-center gap-3 bg-green-900 text-white px-6 py-3 rounded-full hover:bg-green-800 transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 1115 0v.75H4.5v-.75z" />
                        </svg>

                        Profile
                    </a>

                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-500 transition">
                            Logout
                        </button>
                    </form>

                @else
                    <a href="{{ route('login') }}"
                    class="block bg-green-900 text-white px-6 py-3 rounded-full hover:bg-green-800 transition">
                        Login
                    </a>
                @endauth

            </div>
        </div>
    </nav>

<!-- ARTICLE DETAIL -->
<section class="pt-32 pb-20 px-4 md:px-10 max-w-4xl mx-auto">
    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        <img src="{{ asset('storage/' . $article->photo) }}" class="w-full h-96 object-cover" alt="{{ $article->title }}">
        <div class="p-8">
            <h1 class="text-4xl font-display font-bold text-gray-900 mb-4">{{ $article->title }}</h1>
            <p class="text-sm text-gray-500 mb-6">{{ \Carbon\Carbon::parse($article->date)->format('d M Y') }}</p>
            <div class="prose max-w-none text-gray-800 leading-relaxed">{!! nl2br(e($article->content)) !!}</div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 md:px-16 mb-10">
        <a href="{{ url()->previous() }}" class="inline-block bg-green-900 text-white px-6 py-3 rounded-full hover:bg-green-800 transition">
            ← Back
        </a>
    </div>
</section>

<!-- CONTACT SECTION -->
<section class="py-20 px-4 bg-green-900 text-white">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="font-display text-5xl mb-6">Visit Us Today</h2>
        <p class="text-xl text-green-100 mb-8">123 Coffee Street, Brew City<br>Open Daily: 7AM - 8PM</p>
        <div class="flex justify-center gap-6 mb-8">
            <a href="#" class="text-3xl hover:text-green-300">📧</a>
            <a href="#" class="text-3xl hover:text-green-300">📱</a>
            <a href="#" class="text-3xl hover:text-green-300">📍</a>
        </div>
        <button class="bg-white text-green-900 px-8 py-4 rounded-full font-semibold hover:bg-green-50 hover:scale-105 transition">Get Directions</button>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-stone-900 text-stone-400 py-8 text-center">
    <p>&copy; 2025 Brew & Bean. All rights reserved.</p>
</footer>

</body>
</html>
