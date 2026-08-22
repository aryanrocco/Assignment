<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'D3Moon Consulting')</title>
    <meta name="description" content="D3Moon Consulting delivers niche technology talent — quick joiners for product-based and technology-driven organizations.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Outfit:wght@330;400;580;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/d3moon.css') }}">
    <link rel="icon" href="{{ asset('images/d3moon-mark.svg') }}" type="image/svg+xml">
</head>
<body class="d3moon">
    <div class="sky" aria-hidden="true"><canvas id="starfield"></canvas></div>
    <div class="wrap">
        <header class="nav">
            <a class="brand" href="{{ route('home') }}">
                <img src="{{ asset('images/d3moon-mark.svg') }}" alt="D3Moon mark">
                <span class="brand-copy">
                    <strong>D3MOON</strong>
                    <span>Consulting</span>
                </span>
            </a>
            <button class="menu-btn" type="button" data-menu aria-label="Open menu">Menu</button>
            <nav class="nav-links" data-nav>
                <a href="#focus">Focus</a>
                <a href="#domains">Domains</a>
                <a href="#clients">Clients</a>
                <a href="#empanelment">Empanelment</a>
                <a href="{{ route('blog.index') }}">Insights</a>
                <a class="cta" href="#briefing">Request a briefing</a>
            </nav>
        </header>
        @yield('content')
        <footer class="footer">
            <div>© {{ date('Y') }} D3Moon Consulting. Niche technology talent, delivered with urgency.</div>
            <div>
                <a href="mailto:vinkumar@d3moon.com">vinkumar@d3moon.com</a>
                ·
                <a href="tel:+919080308811">+91 9080308811</a>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/d3moon.js') }}"></script>
</body>
</html>
