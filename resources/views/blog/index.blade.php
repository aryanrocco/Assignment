@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<div class="text-center mb-12">
  <h1 class="text-5xl font-extrabold text-cyan-100">Insights</h1>
  <p class="text-slate-400 mt-3">Notes from the D3Moon talent observatory</p>
</div>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
  @foreach($posts as $post)
    <div data-aos="fade-up" 
         class="bg-gradient-to-br from-sky-100 via-cyan-100 to-emerald-100 
                rounded-2xl shadow-lg p-6 flex flex-col">
      <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $post->title }}</h2>
      <p class="text-gray-600 flex-grow">{{ Str::limit($post->content, 120) }}</p>
      <a href="{{ route('blog.show', $post->id) }}" 
   class="mt-4 inline-block px-4 py-2 rounded-lg bg-gradient-to-r 
          from-sky-400 via-cyan-400 to-emerald-400 text-white font-medium 
          hover:scale-[1.02] hover:shadow-lg transition">
  Read More →
</a>
    </div>
  @endforeach
</div>

<div class="mt-8">
  {{ $posts->links() }}
</div>
@endsection
