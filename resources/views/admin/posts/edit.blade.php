@extends('layouts.app')

@section('title','Edit Post')

@section('content')
<div class="max-w-3xl mx-auto">
  <h1 class="text-3xl font-extrabold text-gray-800 mb-6">Edit Post</h1>

  <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" 
        class="bg-gradient-to-br from-sky-100 via-cyan-100 to-emerald-100 
               p-6 rounded-2xl shadow-lg space-y-6">
    @csrf
    @method('PUT')

    <!-- Title -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Title</label>
      <input type="text" name="title" value="{{ old('title', $post->title) }}" required
             class="mt-2 block w-full rounded-lg bg-white border border-gray-300 
                    text-gray-800 px-4 py-2 focus:outline-none 
                    focus:ring-2 focus:ring-cyan-400 transition">
    </div>

    <!-- Content -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Content</label>
      <textarea name="content" rows="6" required
                class="mt-2 block w-full rounded-lg bg-white border border-gray-300 
                       text-gray-800 px-4 py-2 focus:outline-none 
                       focus:ring-2 focus:ring-cyan-400 transition">{{ old('content', $post->content) }}</textarea>
    </div>

    <!-- Submit -->
    <div>
      <button type="submit"
              class="px-6 py-3 rounded-xl bg-gradient-to-r from-sky-400 via-cyan-400 to-emerald-400 
                     text-white font-semibold shadow-md hover:scale-[1.02] hover:shadow-lg transition">
        Update Post →
      </button>
    </div>
  </form>
</div>
@endsection
