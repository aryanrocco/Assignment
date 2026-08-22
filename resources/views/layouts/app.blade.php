<!doctype html>
<html lang="en" class="h-full">
<head>
  <meta charset="utf-8">
  <title>@yield('title', 'D3Moon Consulting')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="h-full flex flex-col bg-slate-950 text-slate-100 font-sans">
  <nav class="bg-slate-950/90 border-b border-cyan-900/40">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="{{ url('/') }}" class="text-xl font-extrabold tracking-[0.18em] text-cyan-300">
        D3MOON
      </a>
      <div class="space-x-6 hidden md:flex items-center">
        <a href="{{ url('/') }}" class="text-slate-200 hover:text-cyan-300 transition">Home</a>
        <a href="{{ route('blog.index') }}" class="text-slate-200 hover:text-cyan-300 transition">Insights</a>
        @auth
          <a href="{{ route('admin.posts.index') }}" class="text-slate-200 hover:text-cyan-300 transition">Dashboard</a>
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="text-slate-200 hover:text-red-400 transition">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="text-slate-200 hover:text-cyan-300 transition">Login</a>
        @endauth
      </div>
    </div>
  </nav>

  <main class="flex-grow max-w-7xl mx-auto px-6 py-10 w-full">
    @if(session('success'))
      <div class="mb-4 p-4 rounded bg-cyan-950 text-cyan-100 border border-cyan-700">
        {{ session('success') }}
      </div>
    @endif
    @yield('content')
  </main>

  <footer class="bg-slate-950 border-t border-cyan-900/40 mt-auto">
    <div class="max-w-7xl mx-auto px-6 py-8 text-center">
      <p class="text-slate-200 font-medium">© {{ date('Y') }} D3Moon Consulting. All rights reserved.</p>
      <p class="text-slate-400 text-sm mt-1">Niche technology talent for product-driven teams</p>
    </div>
  </footer>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init({ duration: 800, once: true });</script>
</body>
</html>
