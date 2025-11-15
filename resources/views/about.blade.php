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
                    <a href="{{ route('about') }}" class="text-green-700 hover:text-green-700 transition">About</a>
                    <a href="{{ route('menu') }}" class="text-gray-700 hover:text-green-700 transition">Menu</a>
                    <a href="{{ route('artikel') }}" class="text-gray-700 hover:text-green-700 transition">Artikel</a>
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
                <a href="{{ route('about') }}" class="block text-green-800 hover:text-green-700">About</a>
                <a href="{{ route('menu') }}" class="block text-gray-800 hover:text-green-700">Menu</a>
                <a href="{{ route('artikel') }}" class="block text-gray-800 hover:text-green-700">Artikel</a>

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
            <div class="grid md:grid-cols-3 gap-10 items-center">
                
                <!-- Left Content -->
                <div class="text-white space-y-6">
                    <h1 class="font-display text-5xl md:text-6xl font-bold leading-tight">
                        About Us
                    </h1>
                    <p class="text-lg md:text-xl text-gray-100 max-w-lg">
                        Contents
                    </p>
                </div>
            </div>
        </div>
    </section>


        <!-- About Section -->
    <section id="about" class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="font-display text-5xl mb-6 text-green-900">Our Story</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Founded in 2015, Brew & Bean began with a simple mission: to bring exceptional coffee to our community. We believe in the art of coffee making, from selecting the finest beans to crafting each drink with precision and care.
                    </p>
                    <p class="text-lg text-gray-600 mb-6">
                        Every cup we serve tells a story of dedication, sustainability, and passion. We work directly with farmers, ensuring fair wages and sustainable practices that benefit everyone in the supply chain.
                    </p>
                </div>
                <div>
                    <img src="{{ asset('images/LogoAis.png') }}"  alt="Coffee Shop Interior" class="rounded-3xl shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section x-data="{ open:false, imageSrc:'', imageTitle:'' }" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-green-900 mb-10">Gallery</h2>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($galleries as $gallery)
                    <div 
                        class="relative group overflow-hidden rounded-lg shadow-md cursor-pointer"
                        @click="
                            open = true;
                            imageSrc = '{{ asset('storage/' . $gallery->photo) }}';
                            imageTitle = '{{ $gallery->photo_name }}';
                        "
                    >
                        <img src="{{ asset('storage/' . $gallery->photo) }}" 
                            alt="{{ $gallery->photo_name }}" 
                            class="w-full h-64 object-cover transform transition duration-500 group-hover:scale-110">

                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                            <h3 class="text-white text-lg font-semibold">{{ $gallery->photo_name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Popup Modal -->
        <div 
            x-show="open"
            x-transition
            class="fixed inset-0 bg-black/70 flex items-center justify-center z-50 p-4"
        >
            <div class="bg-white p-4 rounded-lg shadow-xl max-w-3xl w-full">

                <!-- Large Image -->
                <img :src="imageSrc" :alt="imageTitle" class="w-full max-h-[75vh] object-contain rounded">

                <!-- Title -->
                <p class="text-center text-lg text-gray-700 mt-3" x-text="imageTitle"></p>

                <!-- Close Button -->
                <button 
                    @click="open = false"
                    class="mt-4 w-full bg-green-700 text-white py-3 rounded-lg hover:bg-green-800 transition"
                >
                    Close
                </button>
            </div>
        </div>
    </section>

        <!-- Bumper  -->
    <section id="home" 
        class="relative h-[90vh] flex items-center justify-center bg-cover bg-center"
        style="background-image: url('{{ asset('images/LoginImage.jpg') }}');">
        
        <!-- Overlay (dark translucent layer) -->
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="grid md:grid-cols-3 gap-10 items-center">
                
                <!-- Left Content -->
                <div class="text-white space-y-6">
                    <h1 class="font-display text-5xl md:text-6xl font-bold leading-tight">
                        About Us
                    </h1>
                    <p class="text-lg md:text-xl text-gray-100 max-w-lg">
                        Contents
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section id="contact" class="py-20 px-4 bg-white text-green-900">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="font-display text-5xl mb-6 text-green-900">Visit Us Today</h2>
            <p class="text-xl text-green-100 mb-8 text-green-900">
                123 Coffee Street, Brew City, BC 12345<br/>
                Open Daily: 7:00 AM - 8:00 PM
            </p>
            <div class="flex justify-center gap-6 mb-8">
                <a href="#" class="text-3xl hover:text-green-300 transition">📧</a>
                <a href="#" class="text-3xl hover:text-green-300 transition">📱</a>
                <a href="#" class="text-3xl hover:text-green-300 transition">📍</a>
            </div>
            <button class="bg-green-900 text-white px-8 py-4 rounded-full font-semibold hover:bg-green-800 transition transform hover:scale-105">
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