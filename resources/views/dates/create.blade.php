@extends('dates.layout')

@section('content')
    <div class="max-w-2xl mx-auto">
        <a href="{{ route('dates.category', $categorySlug) }}" class="text-sm text-petal hover:underline">← Other {{ strtolower($category['name']) }}s</a>

        <div class="glass rounded-3xl p-8 mt-6 border border-white shadow-sm">
            <p class="text-xs uppercase tracking-[0.25em] text-petal">{{ $category['emoji'] }} {{ $category['name'] }}</p>
            <h1 class="font-display text-4xl mt-3">{{ $place['name'] }}</h1>
            <p class="text-petal mt-1">{{ $place['area'] }}, Kolkata</p>
            <p class="mt-3 text-roseink/70">{{ $place['note'] }}</p>

            <form method="POST" action="{{ route('dates.store', [$categorySlug, $placeSlug]) }}" class="mt-8 space-y-5">
                @csrf

                <div>
                    <label for="planner_name" class="block text-sm font-medium mb-1">Your name <span class="text-roseink/40 font-normal">(optional)</span></label>
                    <input id="planner_name" name="planner_name" type="text" value="{{ old('planner_name') }}"
                           class="w-full rounded-2xl border border-rose-100 bg-white px-4 py-3 outline-none focus:ring-2 focus:ring-petal/40"
                           placeholder="So I know who locked this in">
                    @error('planner_name')<p class="text-sm text-rose-700 mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label for="planned_on" class="block text-sm font-medium mb-1">Day</label>
                        <input id="planned_on" name="planned_on" type="date" min="{{ now()->toDateString() }}"
                               value="{{ old('planned_on') }}" required
                               class="w-full rounded-2xl border border-rose-100 bg-white px-4 py-3 outline-none focus:ring-2 focus:ring-petal/40">
                        @error('planned_on')<p class="text-sm text-rose-700 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="planned_at" class="block text-sm font-medium mb-1">Time</label>
                        <input id="planned_at" name="planned_at" type="time" value="{{ old('planned_at', '18:00') }}" required
                               class="w-full rounded-2xl border border-rose-100 bg-white px-4 py-3 outline-none focus:ring-2 focus:ring-petal/40">
                        @error('planned_at')<p class="text-sm text-rose-700 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label for="note" class="block text-sm font-medium mb-1">A little note <span class="text-roseink/40 font-normal">(optional)</span></label>
                    <textarea id="note" name="note" rows="4"
                              class="w-full rounded-2xl border border-rose-100 bg-white px-4 py-3 outline-none focus:ring-2 focus:ring-petal/40"
                              placeholder="Wear something cute. I will bring flowers. No phones at dinner...">{{ old('note') }}</textarea>
                    @error('note')<p class="text-sm text-rose-700 mt-1">{{ $message }}</p>@enderror
                </div>

                <button type="submit"
                        class="w-full rounded-full bg-roseink text-blush py-3.5 font-medium hover:bg-rose-950 transition">
                    Lock in this date
                </button>
            </form>
        </div>
    </div>
@endsection
