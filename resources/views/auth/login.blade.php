@extends('layouts.app')

@section('title','Admin Login')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-50">
  <div data-aos="zoom-in" 
       class="w-full max-w-md bg-gradient-to-br from-sky-100 via-cyan-100 to-emerald-100 
              rounded-3xl shadow-xl p-10 border border-gray-200">

    <!-- Title -->
    <div class="text-center mb-8">
      <h2 class="text-4xl font-extrabold text-gray-800 drop-shadow">
        Admin Login
      </h2>
      <p class="text-gray-600 mt-2 text-sm">Welcome back, please sign in</p>
    </div>

    <!-- Error -->
    @if ($errors->any())
      <div data-aos="fade-down" 
           class="mb-4 p-3 rounded-lg bg-red-500/80 text-white text-sm">
        {{ $errors->first() }}
      </div>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('login.attempt') }}" class="space-y-6">
      @csrf
      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus
          class="mt-2 block w-full rounded-lg bg-white border border-gray-300 
                 text-gray-800 placeholder-gray-400 px-4 py-2 focus:outline-none 
                 focus:ring-2 focus:ring-cyan-400 transition">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" required
          class="mt-2 block w-full rounded-lg bg-white border border-gray-300 
                 text-gray-800 placeholder-gray-400 px-4 py-2 focus:outline-none 
                 focus:ring-2 focus:ring-cyan-400 transition">
      </div>
      <div>
        <button type="submit"
          class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-sky-400 via-cyan-400 to-emerald-400
                 text-white font-semibold text-lg shadow-md 
                 hover:scale-[1.02] hover:shadow-lg transition">
          Login →
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
