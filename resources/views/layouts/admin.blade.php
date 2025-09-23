<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a> |
        <a href="{{ route('products.index') }}">Products</a> |
        <a href="{{ route('galleries.index') }}">Galleries</a> |
        <a href="{{ route('news.index') }}">News</a> |
        <a href="{{ route('reviews.index') }}">Reviews</a> |
        
        <form action="{{ route('logout') }}" method="POST" style="display:inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
    <hr>
    <div>
        @yield('content')
    </div>
</body>
</html>
