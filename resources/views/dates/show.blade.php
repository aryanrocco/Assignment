@extends('dates.layout')

@section('content')
    <div class="max-w-xl mx-auto text-center pt-6">
        <p class="uppercase tracking-[0.3em] text-xs text-petal">it is a date</p>
        <h1 class="font-display text-5xl mt-4">See you in Kolkata</h1>

        <div class="glass rounded-3xl p-8 mt-8 text-left border border-white shadow-sm">
            <p class="text-sm text-petal uppercase tracking-widest">{{ $plan->category_name }}</p>
            <p class="font-display text-3xl mt-2">{{ $plan->place_name }}</p>
            <p class="text-roseink/60 mt-1">{{ $plan->place_area }}, Kolkata</p>

            <dl class="mt-6 space-y-3 text-sm">
                <div class="flex justify-between gap-4 border-b border-rose-100 pb-3">
                    <dt class="text-roseink/50">Day</dt>
                    <dd>{{ $plan->planned_on->format('l, j F Y') }}</dd>
                </div>
                <div class="flex justify-between gap-4 border-b border-rose-100 pb-3">
                    <dt class="text-roseink/50">Time</dt>
                    <dd>{{ \Illuminate\Support\Carbon::parse($plan->planned_at)->format('g:i A') }}</dd>
                </div>
                @if($plan->planner_name)
                    <div class="flex justify-between gap-4 border-b border-rose-100 pb-3">
                        <dt class="text-roseink/50">Chosen by</dt>
                        <dd>{{ $plan->planner_name }}</dd>
                    </div>
                @endif
                @if($plan->note)
                    <div class="pt-1">
                        <dt class="text-roseink/50 mb-1">Note</dt>
                        <dd class="leading-relaxed">{{ $plan->note }}</dd>
                    </div>
                @endif
            </dl>
        </div>

        <div class="mt-8 flex flex-wrap justify-center gap-3">
            <a href="{{ route('dates.home') }}" class="rounded-full bg-roseink text-blush px-6 py-3 text-sm">Plan another</a>
            <a href="{{ route('dates.index') }}" class="rounded-full border border-roseink/20 px-6 py-3 text-sm">All our dates</a>
        </div>
    </div>
@endsection
