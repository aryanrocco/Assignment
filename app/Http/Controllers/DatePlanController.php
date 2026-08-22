<?php

namespace App\Http\Controllers;

use App\Models\DatePlan;
use App\Support\KolkataDates;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class DatePlanController extends Controller
{
    public function home(): View
    {
        $plans = Schema::hasTable('date_plans')
            ? DatePlan::query()->latest()->limit(3)->get()
            : collect();

        return view('dates.home', [
            'title' => config('kolkata_dates.couple_title'),
            'tagline' => config('kolkata_dates.tagline'),
            'categories' => KolkataDates::categories(),
            'plans' => $plans,
        ]);
    }

    public function category(string $category): View
    {
        $selected = KolkataDates::category($category);

        abort_if($selected === null, 404);

        return view('dates.category', [
            'title' => config('kolkata_dates.couple_title'),
            'categorySlug' => $category,
            'category' => $selected,
        ]);
    }

    public function create(string $category, string $place): View
    {
        $selectedPlace = KolkataDates::place($category, $place);

        abort_if($selectedPlace === null, 404);

        $selectedCategory = KolkataDates::category($category);

        return view('dates.create', [
            'title' => config('kolkata_dates.couple_title'),
            'categorySlug' => $category,
            'category' => $selectedCategory,
            'placeSlug' => $place,
            'place' => $selectedPlace,
        ]);
    }

    public function store(Request $request, string $category, string $place): RedirectResponse
    {
        $selectedPlace = KolkataDates::place($category, $place);

        abort_if($selectedPlace === null, 404);

        $data = $request->validate([
            'planner_name' => ['nullable', 'string', 'max:80'],
            'planned_on' => ['required', 'date', 'after_or_equal:today'],
            'planned_at' => ['required', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'note' => ['nullable', 'string', 'max:500'],
        ]);

        $plan = DatePlan::create([
            'planner_name' => $data['planner_name'] ?? null,
            'category_slug' => $category,
            'category_name' => $selectedPlace['category_name'],
            'place_slug' => $place,
            'place_name' => $selectedPlace['name'],
            'place_area' => $selectedPlace['area'],
            'planned_on' => $data['planned_on'],
            'planned_at' => substr($data['planned_at'], 0, 5),
            'note' => $data['note'] ?? null,
        ]);

        return redirect()
            ->route('dates.show', $plan)
            ->with('success', 'Date locked in. See you there.');
    }

    public function show(DatePlan $plan): View
    {
        $category = KolkataDates::category($plan->category_slug);

        return view('dates.show', [
            'title' => config('kolkata_dates.couple_title'),
            'plan' => $plan,
            'category' => $category,
        ]);
    }

    public function index(): View
    {
        return view('dates.index', [
            'title' => config('kolkata_dates.couple_title'),
            'plans' => DatePlan::query()->orderBy('planned_on')->orderBy('planned_at')->get(),
        ]);
    }
}
