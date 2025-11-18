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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" defer></script>
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
                    <a href="{{ route('landing') }}" class="text-green-700 hover:text-green-700 transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-700 transition">About</a>
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

                <a href="{{ route('landing') }}" class="block text-green-800 hover:text-green-700">Home</a>
                <a href="{{ route('about') }}" class="block text-gray-800 hover:text-green-700">About</a>
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
        style="background-image: url('{{ asset('images/image1.jpg') }}');">
        
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
                </div>
            </div>
        </div>
    </section>


        <!-- About Section -->
    <section id="about" class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="{{ asset('images/image2.jpg') }}" alt="Coffee Shop Interior" class="rounded-3xl shadow-2xl">
                </div>
                <div>
                    <h2 class="font-display text-5xl mb-6 text-green-900">Our Story</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Founded in 2015, Brew & Bean began with a simple mission: to bring exceptional coffee to our community. We believe in the art of coffee making, from selecting the finest beans to crafting each drink with precision and care.
                    </p>
                    <p class="text-lg text-gray-600 mb-6">
                        Every cup we serve tells a story of dedication, sustainability, and passion. We work directly with farmers, ensuring fair wages and sustainable practices that benefit everyone in the supply chain.
                    </p>
                    <a href="{{ route('menu') }}" class="bg-green-900 text-white px-8 py-4 rounded-full font-semibold hover:bg-green-800 transition">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Preview -->
    <section id="menu" class="py-20 px-4 bg-green-900">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="font-display text-5xl mb-4 text-white">Our Best Menu</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse ($products as $product)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover-lift">
                        <img src="{{ asset('storage/' . $product->photo_product) }}" 
                            alt="{{ $product->name }}" 
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-display text-2xl mb-2 text-green-900">{{ $product->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-semibold text-green-700">
                                    Rp{{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-white text-center col-span-full">No products available.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Why People Choose Us -->
    <section class="py-20 px-4 bg-white">
        <div class="max-w-6xl mx-auto text-center">

            <!-- Section Title -->
            <div class="flex justify-center mb-4">
                <div class="w-12 h-[2px] bg-green-900"></div>
            </div>

            <h2 class="text-3xl font-bold text-green-900">Why people choose us?</h2>

            <p class="text-gray-600 max-w-2xl mx-auto mt-4">
                Lorem ipsum dolor sit amet consectetur. Dolor elit vitae nunc varius. 
                Facilisis eget cras sit semper sit enim. Turpis aliquet ac ut ac donec ut. 
                Sagittis vestibulum at quis non massa netus.
            </p>

            <!-- Feature Grid -->
            <div class="grid md:grid-cols-3 gap-12 mt-16">

                <!-- Feature 1 -->
                <div class="text-center">
                    <img src="/images/icons/menu.png" alt="" class="mx-auto mb-6 w-12 h-12 opacity-80">
                    <h3 class="text-lg font-semibold text-green-900 tracking-wide">MENU FOR EVERY TASTE</h3>
                    <p class="text-gray-600 mt-3 text-sm leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur.
                        Felis eget sit sit scelerisque vestibulum.
                        Urna faucibus amet massa lacus lorem.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center">
                    <img src="/images/icons/beans.png" alt="" class="mx-auto mb-6 w-12 h-12 opacity-80">
                    <h3 class="text-lg font-semibold text-green-900 tracking-wide">ALWAYS QUALITY BEANS</h3>
                    <p class="text-gray-600 mt-3 text-sm leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur.
                        Felis eget sit sit scelerisque vestibulum.
                        Urna faucibus amet massa lacus lorem.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center">
                    <img src="/images/icons/barista.png" alt="" class="mx-auto mb-6 w-12 h-12 opacity-80">
                    <h3 class="text-lg font-semibold text-green-900 tracking-wide">EXPERIENCED BARISTA</h3>
                    <p class="text-gray-600 mt-3 text-sm leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur.
                        Felis eget sit sit scelerisque vestibulum.
                        Urna faucibus amet massa lacus lorem.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section x-data="{ limit: 3 }" class="py-16 px-4">
        <h2 class="text-4xl font-bold text-center text-[#3B5D28] mb-12">
            Berita Terkini
        </h2>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
            @foreach($news as $index => $item)
            <div 
                x-show="{{ $index }} < limit" 
                x-transition 
                class="bg-white shadow-md border border-gray-200 rounded-xl overflow-hidden hover:shadow-xl transition duration-300"
            >
                <div class="h-56 w-full overflow-hidden">
                    <img 
                        src="{{ asset('storage/'.$item->photo_news) }}"
                        alt="{{ $item->title }}"
                        class="w-full h-full object-cover hover:scale-110 transition duration-300"
                    >
                </div>

                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        {{ $item->title }}
                    </h3>

                    <p class="text-sm text-gray-500 mb-3">
                        {{ \Carbon\Carbon::parse($item->date)->format('F d, Y') }}
                    </p>

                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ Str::limit(strip_tags($item->content), 120) }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Reviews Section -->
    <section x-data="{ current: 0, openModal: false }" class="py-20 px-4 bg-white">
        <h2 class="text-4xl font-bold text-center text-[#3B5D28] mb-12">
            Apa Kata Mereka?
        </h2>

        <!-- Wrapper -->
        <div class="relative max-w-7xl mx-auto overflow-hidden">

            <!-- Slider -->
            <div 
                class="flex transition-transform duration-700"
                :style="`transform: translateX(-${current * 100}%)`"
            >
                @foreach($reviews->chunk(3) as $group)
                <div class="min-w-full grid grid-cols-1 md:grid-cols-3 gap-8 px-6">
                    
                    @foreach($group as $item)
                    <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-8 relative">

                        <!-- Quote Icon -->
                        <div class="text-[#6CAB54] text-4xl mb-4">“</div>

                        <!-- Comment -->
                        <p class="text-gray-600 text-sm leading-relaxed mb-6">
                            {{ Str::limit($item->comment, 140) }}
                        </p>

                        <!-- Reviewer -->
                        <div class="flex items-center gap-4">

                            <div>
                                <h4 class="font-semibold text-gray-900 text-sm">
                                    {{ $item->name_review }}
                                </h4>
                                <p class="text-xs text-gray-500">Pelanggan</p>

                                <!-- Rating -->
                                <div class="flex mt-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg 
                                            class="w-4 h-4 {{ $i <= $item->rate ? 'text-yellow-400' : 'text-gray-300' }}" 
                                            fill="currentColor" 
                                            viewBox="0 0 20 20"
                                        >
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.37 2.449a1 1 0 00-.364 1.118l1.285 3.955c.3.922-.755 1.688-1.54 1.118l-3.37-2.449a1 1 0 00-1.175 0l-3.37 2.449c-.784.57-1.838-.196-1.539-1.118l1.285-3.955a1 1 0 00-.364-1.118L2.525 9.382c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.286-3.955z"/>
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>
                @endforeach
            </div>

            <!-- Pagination Dots -->
            <div class="flex justify-center mt-8 gap-3">
                @foreach($reviews->chunk(3) as $i => $group)
                    <button 
                        class="w-3 h-3 rounded-full transition"
                        :class="current === {{ $i }} ? 'bg-[#6CAB54]' : 'bg-gray-300'"
                        @click="current = {{ $i }}"
                    ></button>
                @endforeach
            </div>

        </div>

    <div class="text-center mt-10">

        @auth
            <!-- User logged in → open modal -->
            <button 
                @click="openModal = true"
                class="bg-[#6CAB54] text-white px-5 py-3 rounded-xl font-semibold shadow hover:bg-[#5aa449]">
                Tulis Review
            </button>
        @else
            <!-- User not logged in → redirect to login -->
            <a 
                href="{{ route('login.form') }}"
                class="bg-[#6CAB54] text-white px-5 py-3 rounded-xl font-semibold shadow hover:bg-[#5aa449] inline-block">
                Tulis Review
            </a>
        @endauth

    </div>

        <!-- Review Popup Modal -->
        <div 
            x-show="openModal"
            style="display:none"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        >
            <div 
                x-transition 
                class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-8 relative"
            >
                <!-- Close Button -->
                <button 
                    @click="openModal = false"
                    class="absolute right-4 top-4 text-gray-400 hover:text-red-500 text-xl"
                >&times;</button>

                <h2 class="text-2xl font-bold text-[#3B5D28] mb-6 text-center">
                    Tulis Review Anda
                </h2>

                <form action="{{ route('user.review.store') }}" method="POST">
                    @csrf

                    <label class="block mb-1 font-semibold">Nama Anda</label>
                    <input 
                        type="text" 
                        name="name_review" 
                        class="w-full border p-3 rounded-lg mb-4"
                        required
                    >

                    <label class="block mb-1 font-semibold">Komentar</label>
                    <textarea 
                        name="comment" 
                        class="w-full border p-3 rounded-lg mb-4"
                        required
                    ></textarea>

                    <label class="block mb-1 font-semibold">Rating</label>
                    <select 
                        name="rate" 
                        class="w-full border p-3 rounded-lg mb-6"
                        required
                    >
                        <option value="">-- Pilih Rating --</option>
                        @for($i=1; $i<=5; $i++)
                            <option value="{{ $i }}">{{ $i }} ⭐</option>
                        @endfor
                    </select>

                    <button 
                        type="submit"
                        class="w-full bg-[#3B5D28] text-white py-3 rounded-lg font-semibold hover:bg-[#2c441f]"
                    >
                        Kirim Review
                    </button>
                </form>

            </div>
        </div>

    </section>

    <!-- Footer -->
    <footer class="bg-[#8BC46A] text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-12 items-start">

                <!-- Logo -->
                <div>
                    <img src="{{ asset('images/LogoAis.png') }}" 
                        alt="Ais Cafe Logo" 
                        class="w-48 mb-4">
                </div>

                <!-- Address + Email -->
                <div class="space-y-8">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-location-dot text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Address:</h4>
                            <p class="text-sm opacity-90 w-52">
                                Lorem ipsum dolor sit amet consectetur. Morbi.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-envelope text-white text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Email:</h4>
                            <p class="text-sm opacity-90">Sapien scelerisque</p>
                        </div>
                    </div>
                </div>

                <!-- Phone + Social -->
                <div class="space-y-8">
                    <div class="flex items-start gap-4">
                        <i class="fa-solid fa-phone text-white text-3xl"></i>
                        <div>
                            <h4 class="font-semibold text-lg">+62 897-9792-939</h4>
                            <p class="text-sm opacity-90">Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-6">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fa-brands fa-facebook-f text-white text-xl"></i>
                        </div>
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fa-brands fa-instagram text-white text-xl"></i>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Divider -->
            <div class="mt-12 border-t border-white/20 pt-6 text-center">
                <p class="text-sm opacity-90">
                    Copyright © 2025 Raden Wijaya All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-50 hidden">
        <img src="{{ asset('images/loading.gif') }}" alt="Loading..." class="w-24 h-24">
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const forms = document.querySelectorAll("form");

        forms.forEach(form => {
            form.addEventListener("submit", function () {
                document.getElementById("loadingOverlay").classList.remove("hidden");
            });
        });
    });
</script>


</body>
</html>