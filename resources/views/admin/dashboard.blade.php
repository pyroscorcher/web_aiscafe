@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }} ({{ Auth::user()->role }})</p>

    <a href="{{ route('products.index') }}">Products</a> <br>
    <a href="{{ route('galleries.index') }}">Galleries</a>
    <a href="{{ route('news.index') }}">News</a> |
    <a href="{{ route('reviews.index') }}">Reviews</a> |
@endsection
