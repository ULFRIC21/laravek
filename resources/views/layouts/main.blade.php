<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'YASTREB')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        html, body {
            min-height: 100%;
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #f5f3ee;
        }
        .site-header {
            position: sticky;
            top: 0;
            z-index: 50;
            display: flex;
            justify-content: center;
            padding: 12px 16px;
            background: rgba(245, 243, 238, 0.92);
            backdrop-filter: blur(8px);
        }
        .header-capsule {
            width: 100%;
            max-width: 1200px;
            min-height: 56px;
            background: #f8f6f0;
            border-radius: 9999px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            padding: 8px 20px;
            gap: 18px;
            box-sizing: border-box;
        }
        .header-logo {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            color: #1f2937;
            font-weight: 800;
            letter-spacing: 0.04em;
        }
        .header-nav {
            flex: 1;
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            align-items: center;
        }
        .header-link {
            color: #2d2d2d;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 600;
        }
        .header-link:hover {
            color: #e85d04;
        }
        .header-user {
            text-decoration: none;
        }
        .site-center {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 16px;
            box-sizing: border-box;
        }
        .page-content {
            padding-bottom: 40px;
        }
        .scrollspy-example {
            max-height: 360px;
            overflow-y: auto;
            position: relative;
        }
    </style>
</head>
<body>
<header class="site-header">
    <div class="header-capsule">
        <a href="{{ url('/') }}" class="header-logo">YASTREB</a>

        <nav class="header-nav">
            <a href="{{ route('special') }}" class="header-link">Spec</a>
            <a href="{{ route('reviews') }}" class="header-link">Reviews</a>
            <a href="{{ route('contacts') }}" class="header-link">Contacts</a>
            <a href="{{ route('news') }}" class="header-link">News</a>
            <a href="{{ route('calc') }}" class="header-link">Calc</a>
        </nav>

        @auth
            <div class="dropdown">
                <a href="#" class="btn btn-sm btn-outline-dark dropdown-toggle header-user" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('orders.index') }}">Orders</a></li>
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'driver')
                        <li><a class="dropdown-item" href="{{ route('driver') }}">Driver</a></li>
                    @endif
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'loader')
                        <li><a class="dropdown-item" href="{{ route('loader') }}">Loader</a></li>
                    @endif
                    @if(auth()->user()->role === 'admin')
                        <li><a class="dropdown-item" href="{{ route('admin') }}">Admin</a></li>
                    @endif
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="px-3">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-link text-decoration-none p-0">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-sm btn-dark header-user">Login</a>
        @endauth
    </div>
</header>

<main class="page-content">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
