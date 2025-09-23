<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a> |
        <a href="{{ route('products.index') }}">Products</a> |
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
