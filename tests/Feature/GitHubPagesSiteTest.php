<?php

namespace Tests\Feature;

use Tests\TestCase;

class GitHubPagesSiteTest extends TestCase
{
    public function test_static_pages_site_is_ready_to_publish(): void
    {
        $index = dirname(__DIR__, 2).'/docs/index.html';

        $this->assertFileExists($index);
        $html = file_get_contents($index);

        $this->assertStringContainsString('D3Moon Consulting', $html);
        $this->assertStringContainsString('vinkumar@d3moon.com', $html);
        $this->assertStringContainsString('Securekloud', $html);
        $this->assertStringContainsString('css/d3moon.css', $html);
        $this->assertFileExists(dirname(__DIR__, 2).'/public/css/d3moon.css');
        $this->assertFileExists(dirname(__DIR__, 2).'/public/images/d3moon-mark.svg');
    }
}
