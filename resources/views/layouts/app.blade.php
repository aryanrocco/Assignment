<!doctype html>
<html lang="en" class="h-full">
<head>
  <meta charset="utf-8">
  <title>@yield('title', 'Content Management System (CMS)')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="h-full flex flex-col bg-gray-50 text-gray-800 font-sans">

  <!-- Navbar -->
  <nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <!-- Logo -->
      <a href="{{ url('/') }}" class="text-2xl font-extrabold text-cyan-600">
        Content Management System (CMS)
      </a>

      <!-- Links -->
      <div class="space-x-6 hidden md:flex">
        <a href="{{ url('/') }}" class="text-gray-700 hover:text-cyan-600 transition">Home</a>

        @auth
          <a href="{{ route('admin.posts.index') }}" class="text-gray-700 hover:text-cyan-600 transition">Dashboard</a>
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="text-gray-700 hover:text-red-500 transition">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="text-gray-700 hover:text-cyan-600 transition">Login</a>
        @endauth
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="flex-grow max-w-7xl mx-auto px-6 py-10 w-full">
    @if(session('success'))
      <div class="mb-4 p-4 rounded bg-green-100 text-green-700">
        {{ session('success') }}
      </div>
    @endif
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-gradient-to-r from-sky-100 via-cyan-100 to-emerald-100 mt-auto">
    <div class="max-w-7xl mx-auto px-6 py-8 text-center">
      <p class="text-gray-700 font-medium">© {{ date('Y') }} Simple CMS. All rights reserved.</p>
      <p class="text-gray-500 text-sm mt-1">Built with Laravel & Tailwind CSS</p>
    </div>
  </footer>

  <!-- AOS Script -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init({ duration: 800, once: true });</script>
</body>
</html>
