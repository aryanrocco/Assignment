@extends('dates.layout')

@section('content')
    <div class="mb-8">
        <a href="{{ route('dates.home') }}" class="text-sm text-petal hover:underline">← All categories</a>
        <p class="mt-6 text-4xl">{{ $category['emoji'] }}</p>
        <h1 class="font-display text-5xl mt-2">{{ $category['name'] }}</h1>
        <p class="mt-3 max-w-2xl text-roseink/70">{{ $category['blurb'] }}</p>
        <p class="mt-2 text-sm text-roseink/50">Tap a place in Kolkata, then choose the day and time.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-4">
        @foreach($category['places'] as $slug => $place)
            <a href="{{ route('dates.create', [$categorySlug, $slug]) }}"
               class="glass rounded-3xl p-6 border border-white shadow-sm hover:-translate-y-0.5 hover:shadow-md transition">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h2 class="font-display text-2xl">{{ $place['name'] }}</h2>
                        <p class="text-sm text-petal mt-1">{{ $place['area'] }}</p>
                    </div>
                    <span class="text-xs uppercase tracking-widest text-roseink/40">Kolkata</span>
                </div>
                <p class="mt-3 text-sm text-roseink/70 leading-relaxed">{{ $place['note'] }}</p>
                <p class="mt-4 text-sm font-medium text-roseink">Choose day & time →</p>
            </a>
        @endforeach
    </div>
@endsection
