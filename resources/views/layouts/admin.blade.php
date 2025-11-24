<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIS Cafe</title>
    <link rel="icon" type="image/png" href="{{ asset('images/LogoAis.png') }}">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');    
        .font-display { font-family: 'Poppins', sans-serif; }
        .font-body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-50">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r flex flex-col">
            <div class="p-6 flex items-center justify-center">
                <img src="{{ asset('images/LogoAis.png') }}" alt="Logo" class="w-32">
            </div>

            <nav class="px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg 
                   {{ request()->routeIs('admin.dashboard') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                   <span class="text-lg">🏠</span> Dashboard
                </a>

                <a href="{{ route('products.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg 
                   {{ request()->routeIs('products.*') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                   🥗 Products
                </a>

                <a href="{{ route('galleries.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg 
                   {{ request()->routeIs('galleries.*') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                   🖼️ Gallery
                </a>

                <a href="{{ route('news.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg 
                   {{ request()->routeIs('news.*') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                   📰 News
                </a>

                <a href="{{ route('reviews.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg 
                   {{ request()->routeIs('reviews.*') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                   💬 Reviews
                </a>

                <a href="{{ route('articles.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg 
                   {{ request()->routeIs('articles.*') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                   ✏️ Articles
                </a>
            </nav>

            <div class="mt-auto p-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button 
                        class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">

            <!-- Top bar -->
            <div class="flex justify-end mb-8">
                <a href="{{ url('/') }}"
                   class="px-5 py-2 bg-green-700 text-white rounded-lg flex items-center gap-2 hover:bg-green-800">
                    ← Back to Website
                </a>
            </div>

            @yield('content')

        </main>

    </div>

</body>
</html>
