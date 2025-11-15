<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIS Cafe</title>
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
        
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
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
    
    <!-- Hero Section -->
    <section id="home" 
        class="relative h-[90vh] flex items-center justify-center bg-cover bg-center"
        style="background-image: url('{{ asset('images/LoginImage.jpg') }}');">
        
        <!-- Overlay (dark translucent layer) -->
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                
                <!-- Left Content -->
                <div class="text-white space-y-6">
                    <h1 class="font-display text-5xl md:text-6xl font-bold leading-tight">
                        AIS CAFE
                    </h1>
                    <p class="text-lg md:text-xl text-gray-100 max-w-lg">
                        Natoque at odio elementum ullamcorper ac sagittis ut vel ornare.
                    </p>
                    <button class="bg-green-900 hover:bg-green-800 text-white font-semibold px-6 py-3 rounded-full shadow-md transition duration-300">
                        See More
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section class="py-16 px-4 md:px-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

            @foreach ($articles as $article)
            <a href="{{ route('article.detail', $article->id) }}" 
            class="group block transform hover:-translate-y-1 transition-all">

                <div class="bg-white shadow-md rounded-lg overflow-hidden border-l-4 border-green-700 group-hover:shadow-xl transition">

                    {{-- Article Image --}}
                    <img src="{{ asset('storage/' . $article->photo) }}"
                        alt="{{ $article->title }}"
                        class="w-full h-60 object-cover group-hover:opacity-90 transition">

                    {{-- Content --}}
                    <div class="p-6">
                        <h3 class="font-semibold text-xl text-gray-900 group-hover:text-green-700 transition">
                            {{ $article->title }}
                        </h3>

                        <p class="text-gray-600 text-sm mt-3 mb-4 leading-relaxed">
                            {{ \Illuminate\Support\Str::limit($article->content, 100, '...') }}
                        </p>

                        <p class="text-xs text-gray-500">
                            {{ \Carbon\Carbon::parse($article->date)->format('d M Y') }}
                        </p>
                    </div>

                </div>
            </a>
            @endforeach

        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 px-4 bg-green-900 text-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="font-display text-5xl mb-6">Visit Us Today</h2>
            <p class="text-xl text-green-100 mb-8">
                123 Coffee Street, Brew City, BC 12345<br/>
                Open Daily: 7:00 AM - 8:00 PM
            </p>
            <div class="flex justify-center gap-6 mb-8">
                <a href="#" class="text-3xl hover:text-green-300 transition">📧</a>
                <a href="#" class="text-3xl hover:text-green-300 transition">📱</a>
                <a href="#" class="text-3xl hover:text-green-300 transition">📍</a>
            </div>
            <button class="bg-white text-green-900 px-8 py-4 rounded-full font-semibold hover:bg-green-50 transition transform hover:scale-105">
                Get Directions
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-stone-900 text-stone-400 py-8 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2025 Brew & Bean. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>