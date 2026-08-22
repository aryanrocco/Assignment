<?php

namespace Tests\Feature;

use Tests\TestCase;

class GitHubPagesSiteTest extends TestCase
{
    public function test_static_date_site_is_ready_to_publish(): void
    {
        $index = dirname(__DIR__, 2).'/docs/index.html';

        $this->assertFileExists($index);
        $html = file_get_contents($index);

        $this->assertStringContainsString('Our Kolkata Date', $html);
        $this->assertStringContainsString('Movie Date', $html);
        $this->assertStringContainsString('Flurys', $html);
        $this->assertFileExists(dirname(__DIR__, 2).'/docs/dates.json');
        $this->assertFileExists(dirname(__DIR__, 2).'/docs/images/hero.jpg');
        $this->assertFileExists(dirname(__DIR__, 2).'/docs/images/flurys.jpg');
        $this->assertStringContainsString("images/hero.jpg", $html);
        $this->assertStringNotContainsString('unsplash.com', $html);
    }
}
