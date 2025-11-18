<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AIS Cafe</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine JS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');    
        .font-display { font-family: 'Poppins', sans-serif; }
        .font-body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-white shadow-md p-6">
            <img src="/images/LogoAis.png" class="w-32 mb-8 mx-auto">

            <nav class="space-y-4">
                <a href="#" class="flex items-center gap-3 text-green-900 font-semibold">
                    <i class="fa-solid fa-gauge"></i> Dashboard
                </a>
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-10">

            <!-- TOP BAR WITH BACK BUTTON -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-green-900 mb-1">Dashboard</h1>
                    <p class="text-gray-600">Welcome back, {{ Auth::user()->name ?? 'User' }}</p>
                </div>

                <!-- BACK TO MAIN WEBSITE BUTTON -->
                <a href="{{ url('/') }}"
                   class="inline-flex items-center gap-2 bg-green-700 hover:bg-green-800 text-white 
                          px-5 py-2.5 rounded-lg shadow-md transition-all duration-300">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back to Website
                </a>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Product Card -->
                <a href="{{ route('products.index') }}"
                    class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm
                           hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-pointer
                           flex items-center gap-4"
                    x-data="{ hover: false }"
                    @mouseenter="hover = true"
                    @mouseleave="hover = false">

                    <div class="bg-green-100 text-green-700 p-3 rounded-full transition-all"
                         :class="hover ? 'scale-110' : 'scale-100'">
                        <i class="fa-solid fa-utensils text-xl"></i>
                    </div>

                    <div>
                        <h3 class="font-semibold text-green-900">Products</h3>
                        <p class="text-sm text-gray-500">Manage menu items</p>
                    </div>
                </a>

                <!-- Gallery Card -->
                <a href="{{ route('galleries.index') }}"
                    class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm
                           hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-pointer
                           flex items-center gap-4">

                    <div class="bg-green-100 text-green-700 p-3 rounded-full">
                        <i class="fa-solid fa-images text-xl"></i>
                    </div>

                    <div>
                        <h3 class="font-semibold text-green-900">Gallery</h3>
                        <p class="text-sm text-gray-500">Cafe photos</p>
                    </div>
                </a>

                <!-- News Card -->
                <a href="{{ route('news.index') }}"
                    class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm
                           hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-pointer
                           flex items-center gap-4">

                    <div class="bg-green-100 text-green-700 p-3 rounded-full">
                        <i class="fa-solid fa-newspaper text-xl"></i>
                    </div>

                    <div>
                        <h3 class="font-semibold text-green-900">News</h3>
                        <p class="text-sm text-gray-500">Announcements</p>
                    </div>
                </a>

                <!-- Reviews Card -->
                <a href="{{ route('reviews.index') }}"
                    class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm
                        hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-pointer
                        flex items-center gap-4">

                    <div class="bg-green-100 text-green-700 p-3 rounded-full">
                        <i class="fa-solid fa-comments text-xl"></i>
                    </div>

                    <div>
                        <h3 class="font-semibold text-green-900">Reviews</h3>
                        <p class="text-sm text-gray-500">Customer feedback</p>
                    </div>
                </a>

                <!-- Articles Card -->
                <a href="{{ route('articles.index') }}"
                    class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm
                        hover:shadow-lg hover:-translate-y-1 transition-all duration-300 cursor-pointer
                        flex items-center gap-4">

                    <div class="bg-green-100 text-green-700 p-3 rounded-full">
                        <i class="fa-solid fa-pen-to-square text-xl"></i>
                    </div>

                    <div>
                        <h3 class="font-semibold text-green-900">Articles</h3>
                        <p class="text-sm text-gray-500">Blog & posts</p>
                    </div>
                </a>

            </div>
        </main>
    </div>
</body>
</html>
