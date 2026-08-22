<?php

namespace Tests\Feature;

use App\Models\DatePlan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DatePlanTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_shows_date_categories(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Movie Date');
        $response->assertSee('Cafe Date');
        $response->assertSee('Dinner Date');
        $response->assertSee('Traveling Date');
    }

    public function test_category_lists_kolkata_places(): void
    {
        $response = $this->get('/plan/cafe');

        $response->assertOk();
        $response->assertSee('Flurys');
        $response->assertSee('Park Street');
    }

    public function test_unknown_category_is_not_found(): void
    {
        $this->get('/plan/not-a-real-date')->assertNotFound();
    }

    public function test_she_can_lock_in_a_date(): void
    {
        $day = now()->addDay()->toDateString();

        $response = $this->post('/plan/dinner/peter-cat', [
            'planner_name' => 'Her',
            'planned_on' => $day,
            'planned_at' => '19:30',
            'note' => 'Chelo kebab, please.',
        ]);

        $plan = DatePlan::query()->first();

        $this->assertNotNull($plan);
        $response->assertRedirect(route('dates.show', $plan));
        $this->assertSame('Peter Cat', $plan->place_name);
        $this->assertSame('Park Street', $plan->place_area);
        $this->assertSame('Dinner Date', $plan->category_name);
        $this->assertSame('Chelo kebab, please.', $plan->note);
    }

    public function test_past_days_are_rejected(): void
    {
        $this->from('/plan/movie/nandan')
            ->post('/plan/movie/nandan', [
                'planned_on' => now()->subDay()->toDateString(),
                'planned_at' => '18:00',
            ])
            ->assertSessionHasErrors('planned_on')
            ->assertRedirect('/plan/movie/nandan');
    }

    public function test_confirmation_page_shows_the_plan(): void
    {
        $plan = DatePlan::create([
            'planner_name' => 'Her',
            'category_slug' => 'riverside',
            'category_name' => 'Riverside Date',
            'place_slug' => 'prinsep-ghat',
            'place_name' => 'Prinsep Ghat',
            'place_area' => 'Strand Road',
            'planned_on' => now()->addDays(2)->toDateString(),
            'planned_at' => '17:45',
            'note' => 'Sunset',
        ]);

        $this->get(route('dates.show', $plan))
            ->assertOk()
            ->assertSee('Prinsep Ghat')
            ->assertSee('Sunset');
    }
}
