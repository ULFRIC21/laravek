<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ЯСТРЕБ — Грузоперевозки')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        html, body { width: 100%; min-height: 100%; margin: 0; padding: 0; font-family: 'Nunito', sans-serif; background-color: #f5f3ee; }
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
            display: flex;
            justify-content: center;
            padding: 12px 16px;
        }
        .header-capsule {
            width: 100%;
            max-width: 1200px;
            height: 56px;
            background: #f8f6f0;
            border-radius: 9999px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            padding: 0 20px;
            box-sizing: border-box;
        }
        .header-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            margin-right: 24px;
        }
        .header-logo img {
            height: 36px;
            width: auto;
            display: block;
        }
        .header-nav {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 28px;
            flex-wrap: wrap;
        }
        .header-link {
            font-size: 0.9rem;
            font-weight: 600;
            color: #2d2d2d;
            text-decoration: none;
            white-space: nowrap;
        }
        .header-link:hover { color: #e85d04; }
        .header-link--long {
            white-space: normal;
            max-width: 160px;
        }
        .header-user {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f8f6f0;
            border: 1px solid #e8e6e0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 16px;
            flex-shrink: 0;
            text-decoration: none;
        }
        .header-user:hover { background: #eeece6; }
        .user-icon {
            width: 22px;
            height: 22px;
        }
        .site-center {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 16px;
            box-sizing: border-box;
        }
        .page-content {
            padding: 80px 0 0;
        }
        .scrollspy-example {
            max-height: 360px;
            overflow-y: auto;
            position: relative;
        }
        .site-footer {
            background: #1f2937;
            color: #f9fafb;
            padding: 36px 0;
            margin-top: 48px;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }
        .footer-title {
            font-weight: 700;
            margin-bottom: 12px;
        }
        .footer-text {
            color: #d1d5db;
            line-height: 1.5;
            margin: 0 0 8px;
        }
        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .footer-links a {
            color: #f9fafb;
            text-decoration: none;
        }
        .footer-links a:hover { color: #fbbf24; }
        @media (max-width: 768px) {
            .header-capsule {
                height: auto;
                flex-wrap: wrap;
                padding-top: 12px;
                padding-bottom: 12px;
            }
            .header-nav {
                width: 100%;
                gap: 14px;
            }
            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
@include('partials.header')

<main class="page-content">
    @yield('content')
</main>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
