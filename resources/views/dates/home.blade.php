@extends('dates.layout')

@section('content')
    <section class="text-center pt-6 pb-12">
        <p class="uppercase tracking-[0.35em] text-xs text-petal mb-4">Kolkata · just us</p>
        <h1 class="font-display text-5xl sm:text-7xl leading-tight">{{ $title }}</h1>
        <p class="mt-5 max-w-xl mx-auto text-lg text-roseink/70">{{ $tagline }}</p>
        <p class="mt-3 text-sm text-roseink/50">Choose a kind of date. Then pick a place, a day, and a time.</p>
    </section>

    <section class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($categories as $slug => $category)
            <a href="{{ route('dates.category', $slug) }}"
               class="glass group rounded-3xl p-6 border border-white/80 shadow-sm hover:-translate-y-1 hover:shadow-lg transition">
                <div class="text-3xl mb-4">{{ $category['emoji'] }}</div>
                <h2 class="font-display text-2xl">{{ $category['name'] }}</h2>
                <p class="mt-2 text-sm text-roseink/65 leading-relaxed">{{ $category['blurb'] }}</p>
                <p class="mt-4 text-xs uppercase tracking-widest text-petal group-hover:underline">
                    {{ count($category['places']) }} places
                </p>
            </a>
        @endforeach
    </section>

    @if($plans->isNotEmpty())
        <section class="mt-14">
            <div class="flex items-end justify-between mb-5">
                <h2 class="font-display text-3xl">Latest plans</h2>
                <a href="{{ route('dates.index') }}" class="text-sm text-petal hover:underline">See all</a>
            </div>
            <div class="grid md:grid-cols-3 gap-4">
                @foreach($plans as $plan)
                    <a href="{{ route('dates.show', $plan) }}" class="rounded-2xl bg-white/80 border border-rose-100 p-5 hover:border-petal/40 transition">
                        <p class="text-xs uppercase tracking-widest text-petal">{{ $plan->category_name }}</p>
                        <p class="font-display text-xl mt-1">{{ $plan->place_name }}</p>
                        <p class="text-sm text-roseink/60 mt-2">
                            {{ $plan->planned_on->format('D, j M Y') }}
                            ·
                            {{ \Illuminate\Support\Carbon::parse($plan->planned_at)->format('g:i A') }}
                        </p>
                    </a>
                @endforeach
            </div>
        </section>
    @endif
@endsection
