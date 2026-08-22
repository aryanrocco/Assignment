<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $title ?? 'Our Kolkata Date')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Cormorant Garamond', 'serif'],
                        sans: ['Outfit', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        roseink: '#4a1c2a',
                        blush: '#f8e7ea',
                        petal: '#d4788b',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background:
                radial-gradient(1200px 600px at 10% -10%, rgba(212, 120, 139, 0.18), transparent 55%),
                radial-gradient(900px 500px at 100% 0%, rgba(124, 58, 237, 0.10), transparent 50%),
                #fff7f5;
        }
        .glass {
            background: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="min-h-screen text-roseink font-sans antialiased">
    <header class="max-w-6xl mx-auto px-5 py-6 flex items-center justify-between">
        <a href="{{ route('dates.home') }}" class="flex items-baseline gap-2">
            <span class="text-2xl font-display italic">Our Kolkata Date</span>
            <span class="hidden sm:inline text-xs tracking-[0.2em] uppercase text-petal">pick a day · a time · a place</span>
        </a>
        <nav class="flex items-center gap-5 text-sm">
            <a href="{{ route('dates.home') }}" class="hover:text-petal transition">Categories</a>
            <a href="{{ route('dates.index') }}" class="hover:text-petal transition">Our plans</a>
        </nav>
    </header>

    <main class="max-w-6xl mx-auto px-5 pb-16">
        @if(session('success'))
            <div class="mb-6 rounded-2xl bg-rose-100 text-rose-800 px-5 py-3 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="max-w-6xl mx-auto px-5 pb-10 text-center text-sm text-roseink/50">
        Made for wandering Kolkata together.
    </footer>
</body>
</html>
