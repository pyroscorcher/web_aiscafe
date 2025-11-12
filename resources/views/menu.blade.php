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
</head>
<body class="font-body bg-stone-50">
    <!-- Nav Section -->
    <nav class="fixed w-full bg-white/95 backdrop-blur-sm shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center h-full">
                    <img src="{{ asset('images/LogoAis.png') }}" 
                        alt="Ais Cafe Logo" 
                        class="h-12 w-auto object-contain">
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('landing') }}" class="text-gray-700 hover:text-green-700 transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-700 transition">About</a>
                    <a href="{{ route('menu') }}" class="text-green-700 hover:text-green-700 transition">Menu</a>
                    <a href="{{ route('artikel') }}" class="text-gray-700 hover:text-green-700 transition">Artikel</a>
                </div>
                <button class="bg-green-900 text-white px-6 py-2 rounded-full hover:bg-green-800 transition">
                    Login
                </button>
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

    <!-- Menu Section -->
    <section id="menu" class="pt-24 pb-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Section Title -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-green-700">OUR MENU</h2>
            </div>

            <!-- Menu Grid -->
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse ($products as $product)
                    <div class="bg-green-700 text-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition transform">
                        <img src="{{ asset('storage/' . $product->photo_product) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover">
                        <div class="p-5">
                            <h3 class="font-semibold text-lg mb-2">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-100 mb-2">{{ $product->description }}</p>
                            <p class="font-bold text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 col-span-full">No products available.</p>
                @endforelse
            </div>
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
    
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>
</html>