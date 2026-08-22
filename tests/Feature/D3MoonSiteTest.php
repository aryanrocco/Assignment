<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class D3MoonSiteTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_presents_d3moon_identity_and_domains(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('D3Moon');
        $response->assertSee('Vinoth Kumar');
        $response->assertSee('vinkumar@d3moon.com');
        $response->assertSee('Java Full Stack Developers');
        $response->assertSee('Securekloud');
        $response->assertSee('8.33%');
        $response->assertSee('Birlasoft');
        $response->assertSee('CKA Birla Group');
        $response->assertSee('Jocata');
        $response->assertSee('Visit website');
    }

    public function test_briefing_request_requires_core_fields(): void
    {
        $response = $this->from('/')->post('/briefing', []);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['name', 'company', 'email', 'message']);
    }

    public function test_briefing_request_can_be_submitted(): void
    {
        $response = $this->from('/')->post('/briefing', [
            'name' => 'Talent Lead',
            'company' => 'Securekloud',
            'email' => 'ta@example.com',
            'phone' => '+91 9000000000',
            'window' => 'Weekday morning IST',
            'message' => 'We would like to discuss vendor empanelment.',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('briefing');
    }
}
