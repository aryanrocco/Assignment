<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('site.home', [
            'domains' => $this->domains(),
            'clients' => [
                'Birlasoft',
                'Jocata',
                'Intellect Design Arena',
                'Presidio',
                'Desicrew',
                'Clayfin',
                'Invisibl Cloud',
            ],
        ]);
    }

    public function contact(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'company' => ['required', 'string', 'max:160'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['nullable', 'string', 'max:40'],
            'window' => ['nullable', 'string', 'max:80'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        Log::info('D3Moon briefing request', $data);

        return back()->with('briefing', 'Thank you. Vinoth will confirm a convenient time to connect.');
    }

    /**
     * @return array<int, array{id: string, name: string, summary: string, roles: array<int, string>}>
     */
    private function domains(): array
    {
        return [
            [
                'id' => 'fullstack',
                'name' => 'Full Stack & Development',
                'summary' => 'Builders who can ship product, not just tickets.',
                'roles' => [
                    'Java Full Stack Developers',
                    'UI Full Stack (React, Angular, NodeJS)',
                    'Python Developers',
                ],
            ],
            [
                'id' => 'data-ai',
                'name' => 'Data & AI',
                'summary' => 'Emerging skills hired with precision and urgency.',
                'roles' => [
                    'Data Science',
                    'RAG (Retrieval Augmented Generation)',
                    'Generative AI',
                    'Agentic AI',
                    'Machine Learning Engineers',
                ],
            ],
            [
                'id' => 'cloud',
                'name' => 'Cloud & DevOps',
                'summary' => 'Architects and operators who keep go-to-market on schedule.',
                'roles' => [
                    'AWS Specialists & Architects',
                    'Azure Specialists & Architects',
                    'GCP Specialists & Architects',
                    'Cloud DevOps Engineers',
                ],
            ],
            [
                'id' => 'enterprise',
                'name' => 'Enterprise Platforms',
                'summary' => 'Niche platform talent for complex delivery programs.',
                'roles' => [
                    'Salesforce Developers & Architects',
                    'Mulesoft Developers',
                    'Oracle Functional & Technical Consultants',
                ],
            ],
            [
                'id' => 'quality',
                'name' => 'Quality & Experience',
                'summary' => 'The last mile that makes products shippable.',
                'roles' => [
                    'Testing (Manual, Automation, Performance)',
                    'UX/UI Designers',
                ],
            ],
        ];
    }
}
