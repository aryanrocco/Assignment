@extends('dates.layout')

@section('content')
    <div class="mb-8">
        <h1 class="font-display text-5xl">Our plans</h1>
        <p class="mt-3 text-roseink/65">Every date she has locked in — day, time, and place in Kolkata.</p>
    </div>

    @if($plans->isEmpty())
        <div class="glass rounded-3xl p-10 text-center border border-white">
            <p class="font-display text-3xl">Nothing on the calendar yet</p>
            <p class="mt-2 text-roseink/60">Pick a category and choose where we should go.</p>
            <a href="{{ route('dates.home') }}" class="inline-block mt-6 rounded-full bg-roseink text-blush px-6 py-3 text-sm">Start with a category</a>
        </div>
    @else
        <div class="space-y-3">
            @foreach($plans as $plan)
                <a href="{{ route('dates.show', $plan) }}"
                   class="glass flex flex-col sm:flex-row sm:items-center justify-between gap-3 rounded-2xl p-5 border border-white hover:shadow-md transition">
                    <div>
                        <p class="text-xs uppercase tracking-widest text-petal">{{ $plan->category_name }}</p>
                        <p class="font-display text-2xl">{{ $plan->place_name }}</p>
                        <p class="text-sm text-roseink/60">{{ $plan->place_area }}, Kolkata</p>
                    </div>
                    <div class="text-sm sm:text-right">
                        <p>{{ $plan->planned_on->format('D, j M Y') }}</p>
                        <p class="text-roseink/55">{{ \Illuminate\Support\Carbon::parse($plan->planned_at)->format('g:i A') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
@endsection
