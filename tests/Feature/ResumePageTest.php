<?php

namespace Tests\Feature;

use Tests\TestCase;

class ResumePageTest extends TestCase
{
    public function test_resume_page_includes_ciel_current_role(): void
    {
        $response = $this->get('/resume');

        $response->assertOk();
        $response->assertSee('CIEL HR', false);
        $response->assertSee('May 2025 – Present', false);
        $response->assertSee('Business Development Executive', false);
    }
}
