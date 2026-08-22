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
            'clients' => $this->clients(),
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

    /**
     * @return array<int, array{slug: string, name: string, sector: string, website: string, logo: string, about: string}>
     */
    private function clients(): array
    {
        return [
            [
                'slug' => 'birlasoft',
                'name' => 'Birlasoft',
                'sector' => 'Enterprise digital transformation',
                'website' => 'https://www.birlasoft.com',
                'logo' => 'images/clients/birlasoft.svg',
                'about' => 'A CKA Birla Group technology company that helps global enterprises modernize with cloud, AI, data, and enterprise applications. Birlasoft pairs industry depth with digital engineering so programs move at the speed product teams need.',
            ],
            [
                'slug' => 'jocata',
                'name' => 'Jocata',
                'sector' => 'Digital lending & credit decisioning',
                'website' => 'https://jocata.com',
                'logo' => 'images/clients/jocata.svg',
                'about' => 'A fintech platform company that digitizes lending, KYC, credit underwriting, and compliance workflows for banks and NBFCs. Jocata is built for institutions that need faster, cleaner credit decisions without losing control.',
            ],
            [
                'slug' => 'intellect',
                'name' => 'Intellect Design Arena',
                'sector' => 'AI-first banking & open finance',
                'website' => 'https://www.intellectdesign.com',
                'logo' => 'images/clients/intellect.svg',
                'about' => 'A global financial-technology product company serving banks, insurers, and capital-markets firms. Intellect builds composable, AI-first platforms across retail and corporate banking, treasury, liquidity, and insurance.',
            ],
            [
                'slug' => 'presidio',
                'name' => 'Presidio',
                'sector' => 'Cloud, AI & digital solutions',
                'website' => 'https://www.presidio.com',
                'logo' => 'images/clients/presidio.svg',
                'about' => 'A digital technology solutions partner that designs, builds, and manages cloud, security, and AI estates for enterprises. Presidio is known for taking complex infrastructure programs from architecture through run-state.',
            ],
            [
                'slug' => 'desicrew',
                'name' => 'Desicrew',
                'sector' => 'Impact sourcing & rural BPO',
                'website' => 'https://desicrew.in',
                'logo' => 'images/clients/desicrew.svg',
                'about' => 'An impact-sourcing company that delivers business-process and technology support from rural and semi-urban talent centers in India. Desicrew combines operational quality with a model that creates skilled jobs outside metro cities.',
            ],
            [
                'slug' => 'clayfin',
                'name' => 'Clayfin',
                'sector' => 'Digital banking experience',
                'website' => 'https://www.clayfin.com',
                'logo' => 'images/clients/clayfin.svg',
                'about' => 'A digital-banking specialist that helps financial institutions design and deliver customer-facing journeys — onboarding, servicing, and omnichannel engagement — on modern experience platforms.',
            ],
            [
                'slug' => 'invisibl',
                'name' => 'Invisibl Cloud',
                'sector' => 'Cloud-native platforms',
                'website' => 'https://invisiblcloud.com',
                'logo' => 'images/clients/invisibl.svg',
                'about' => 'A cloud-native technology firm focused on building and operating modern infrastructure, platform engineering, and cloud delivery for product and enterprise teams that need reliable scale.',
            ],
        ];
    }
}
