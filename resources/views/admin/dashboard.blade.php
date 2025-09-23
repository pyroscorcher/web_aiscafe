@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }} ({{ Auth::user()->role }})</p>
    <a href="{{ route('products.index') }}">Manage Products</a>
@endsection
