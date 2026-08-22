@extends('layouts.site')

@section('title', 'D3Moon Consulting — Niche technology talent, ready to join')

@section('content')
<main>
    <section class="hero" id="top">
        <div>
            <p class="kicker">Specialized recruitment partner</p>
            <h1>Talent that lands before the launch window closes.</h1>
            <p class="lede">
                D3Moon is a specialized recruitment partner focused on delivering high-quality niche technology talent to product-based and technology-driven organizations. We understand the urgency and precision required in hiring for emerging and critical skills.
            </p>
            <div class="hero-actions">
                <a class="cta" href="#briefing">Explore vendor empanelment</a>
                <a class="ghost" href="#domains">Browse the talent sky</a>
            </div>
            <div class="metrics">
                <div class="metric">
                    <b>Quick joiners</b>
                    <span>Primary focus: people who can accelerate delivery now.</span>
                </div>
                <div class="metric">
                    <b>8.33%</b>
                    <span>Transparent commercial terms on successful closures.</span>
                </div>
                <div class="metric">
                    <b>30 days</b>
                    <span>Payment cycle designed for a clean partnership rhythm.</span>
                </div>
            </div>
        </div>
        <div class="observatory" aria-hidden="true">
            <div class="orbit-ring"></div>
            <div class="orbit-ring inner"></div>
            <div class="moon-core">
                <img src="{{ asset('images/d3moon-mark.svg') }}" alt="">
            </div>
            <button class="star-node" style="left:18%;top:28%" data-domain data-name="Full Stack &amp; Development" data-summary="Builders who can ship product, not just tickets." data-roles="Java Full Stack Developers|UI Full Stack (React, Angular, NodeJS)|Python Developers" data-label="Full Stack" type="button"></button>
            <button class="star-node" style="left:82%;top:22%" data-domain data-name="Data &amp; AI" data-summary="Emerging skills hired with precision and urgency." data-roles="Data Science|RAG (Retrieval Augmented Generation)|Generative AI|Agentic AI|Machine Learning Engineers" data-label="Data &amp; AI" type="button"></button>
            <button class="star-node" style="left:88%;top:62%" data-domain data-name="Cloud &amp; DevOps" data-summary="Architects and operators who keep go-to-market on schedule." data-roles="AWS Specialists &amp; Architects|Azure Specialists &amp; Architects|GCP Specialists &amp; Architects|Cloud DevOps Engineers" data-label="Cloud" type="button"></button>
            <button class="star-node" style="left:48%;top:12%" data-domain data-name="Enterprise Platforms" data-summary="Niche platform talent for complex delivery programs." data-roles="Salesforce Developers &amp; Architects|Mulesoft Developers|Oracle Functional &amp; Technical Consultants" data-label="Enterprise" type="button"></button>
            <button class="star-node" style="left:22%;top:74%" data-domain data-name="Quality &amp; Experience" data-summary="The last mile that makes products shippable." data-roles="Testing (Manual, Automation, Performance)|UX/UI Designers" data-label="Quality" type="button"></button>
        </div>
    </section>

    <section id="focus">
        <div class="section-head">
            <p class="kicker">Why D3Moon</p>
            <h2>Urgency, without compromising the brief.</h2>
            <p>Our primary focus is on quick joiners who can accelerate project delivery and help businesses meet their go-to-market timelines efficiently.</p>
        </div>
        <div class="grid-3">
            <article class="panel">
                <h3>Niche, not generic</h3>
                <p>We hire for emerging and critical skills — RAG, Agentic AI, multi-cloud architecture, Salesforce, Mulesoft, Oracle — the roles product organizations actually stall on.</p>
            </article>
            <article class="panel">
                <h3>Precision matching</h3>
                <p>We understand the urgency and precision required in hiring. Shortlists are built for the stack, the product context, and the join date — not a volume dump.</p>
            </article>
            <article class="panel">
                <h3>Repeat engagement</h3>
                <p>Clients come back because delivery holds. Quality of talent and reliability of process are how we earn a place in your TA ecosystem.</p>
            </article>
        </div>
    </section>

    <section id="domains">
        <div class="section-head">
            <p class="kicker">Technology domains</p>
            <h2>A sky of scarce skills, mapped.</h2>
            <p>Select a star on the observatory — or tap a domain below — to see the roles we specialize in.</p>
        </div>
        <div class="constellation-stage">
            <div class="domain-card">
                <p class="kicker">Active constellation</p>
                <h3 data-domain-title>Full Stack &amp; Development</h3>
                <p data-domain-summary>Builders who can ship product, not just tickets.</p>
                <div class="chip-row" data-domain-roles></div>
            </div>
            <div class="grid-3" style="grid-template-columns:1fr">
                @foreach ($domains as $domain)
                    <button class="panel" type="button" data-domain data-name="{{ $domain['name'] }}" data-summary="{{ $domain['summary'] }}" data-roles="{{ implode('|', $domain['roles']) }}" style="text-align:left;cursor:pointer;width:100%;color:inherit">
                        <h3>{{ $domain['name'] }}</h3>
                        <p>{{ $domain['summary'] }}</p>
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="section-head">
            <p class="kicker">Engagement protocol</p>
            <h2>Clear commercials. No fog on the terms.</h2>
        </div>
        <div class="terms">
            <div class="term-plaque">
                <div class="num">8.33%</div>
                <h3>Success fee</h3>
                <p>We work for 8.33% — a simple, competitive structure that keeps the partnership focused on closures that actually join.</p>
            </div>
            <div class="term-plaque">
                <div class="num">30</div>
                <h3>Day payment cycle</h3>
                <p>Payment in 30 days. Predictable for finance, frictionless for talent acquisition, built for long-term empanelment.</p>
            </div>
        </div>
    </section>

    <section id="clients">
        <div class="section-head">
            <p class="kicker">Current clientele</p>
            <h2>Trusted by technology-driven organizations.</h2>
            <p>Select a client to see the mark and a short briefing on who they are. Repeat engagement with these organizations reflects our commitment to quality and delivery excellence.</p>
        </div>
        <div class="client-stage">
            <div class="client-rail" role="tablist" aria-label="Clients">
                @foreach ($clients as $index => $client)
                    <button
                        class="client-tile{{ $index === 0 ? ' active' : '' }}"
                        type="button"
                        role="tab"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                        data-client
                        data-name="{{ $client['name'] }}"
                        data-sector="{{ $client['sector'] }}"
                        data-about="{{ $client['about'] }}"
                        data-website="{{ $client['website'] }}"
                        data-logo="{{ asset($client['logo']) }}"
                    >
                        <img src="{{ asset($client['logo']) }}" alt="{{ $client['name'] }} logo">
                    </button>
                @endforeach
            </div>
            @php $featured = $clients[0]; @endphp
            <article class="client-dossier" data-client-dossier>
                <img data-client-logo src="{{ asset($featured['logo']) }}" alt="{{ $featured['name'] }} logo">
                <p class="kicker" data-client-sector>{{ $featured['sector'] }}</p>
                <h3 data-client-name>{{ $featured['name'] }}</h3>
                <p data-client-about>{{ $featured['about'] }}</p>
                <a class="ghost" data-client-link href="{{ $featured['website'] }}" target="_blank" rel="noreferrer">Visit website</a>
            </article>
        </div>
    </section>

    <section id="empanelment">
        <div class="partner">
            <div>
                <p class="kicker">Vendor empanelment</p>
                <h2>Ready to add value to Securekloud’s talent acquisition ecosystem.</h2>
                <p>We would be honored to explore a vendor empanelment opportunity with Securekloud and demonstrate how D3Moon can supply niche, quick-joining technology talent against your most urgent product timelines.</p>
            </div>
            <div>
                <a class="cta" href="#briefing">Propose a time to connect</a>
                <p style="color:var(--mute);margin-top:16px">Looking forward to the possibility of collaborating with your team.</p>
            </div>
        </div>
    </section>

    <section id="briefing" class="contact-grid">
        <div>
            <p class="kicker">Mission control</p>
            <div class="person">
                <img src="{{ asset('images/d3moon-mark.svg') }}" alt="" width="64" height="64">
                <div>
                    <p class="sig">Vinoth Kumar</p>
                    <p>Managing Director — D3Moon Consulting</p>
                </div>
            </div>
            <p>
                <a href="mailto:vinkumar@d3moon.com">vinkumar@d3moon.com</a><br>
                <a href="tel:+919080308811">+91 9080308811</a>
            </p>
            <p class="lede">Tell us a convenient time to connect. We will come prepared with a domain map aligned to your open critical skills.</p>
        </div>
        <form class="panel" data-briefing-form method="POST" action="{{ route('contact.store') }}">
            @csrf
            @if (session('briefing'))
                <div class="flash">{{ session('briefing') }}</div>
            @endif
            @if ($errors->any())
                <div class="errors">{{ $errors->first() }}</div>
            @endif
            <label>Name
                <input name="name" value="{{ old('name') }}" required>
            </label>
            <label>Company
                <input name="company" value="{{ old('company') }}" required>
            </label>
            <label>Work email
                <input type="email" name="email" value="{{ old('email') }}" required>
            </label>
            <label>Phone
                <input name="phone" value="{{ old('phone') }}" placeholder="+91">
            </label>
            <label>Convenient window
                <select name="window">
                    <option value="">Select a window</option>
                    <option @selected(old('window') === 'Weekday morning IST')>Weekday morning IST</option>
                    <option @selected(old('window') === 'Weekday afternoon IST')>Weekday afternoon IST</option>
                    <option @selected(old('window') === 'Weekday evening IST')>Weekday evening IST</option>
                </select>
            </label>
            <label>How can we help
                <textarea name="message" required>{{ old('message') }}</textarea>
            </label>
            <button class="cta" type="submit">Send briefing request</button>
        </form>
    </section>
</main>
@endsection
