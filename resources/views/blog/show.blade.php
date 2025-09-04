@extends('layouts.app')

@section('title', $post->title)

@section('content')
<article data-aos="fade-up" 
         class="bg-gradient-to-br from-sky-100 via-cyan-100 to-emerald-100 
                rounded-2xl shadow-xl p-10">
  <h1 class="text-4xl font-extrabold text-gray-800 mb-4">{{ $post->title }}</h1>
  <p class="text-gray-600 leading-relaxed">{{ $post->content }}</p>
</article>
@endsection
