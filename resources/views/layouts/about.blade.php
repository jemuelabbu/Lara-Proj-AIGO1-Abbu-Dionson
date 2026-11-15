@extends('layouts.app')

@section('title', 'About')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@php
    // Team data: replace the placeholder names (and add a photo path) when real details are available.
    // Photos go in public/images/team/ — leave 'photo' as null to show the default avatar.
    $team = [
        ['name' => 'Team Member 1', 'role' => 'Founder & Head Roaster', 'photo' => null, 'bio' => 'Chooses the beans and roasts every batch each morning.'],
        ['name' => 'Team Member 2', 'role' => 'Head Barista',           'photo' => null, 'bio' => 'Dials in the espresso and trains the rest of the bar team.'],
        ['name' => 'Team Member 3', 'role' => 'Pastry Chef',            'photo' => null, 'bio' => 'Bakes the croissants, rolls, and cookies before we open.'],
        ['name' => 'Team Member 4', 'role' => 'Café Manager',           'photo' => null, 'bio' => 'Keeps the shop running and makes sure every guest feels at home.'],
    ];

    $services = [
        ['title' => 'Freshly roasted coffee', 'text' => 'Espresso drinks, lattes, and iced coffee made from beans roasted in small batches.'],
        ['title' => 'Baked-daily pastries',   'text' => 'Croissants, breads, and cookies baked every morning to go with your cup.'],
        ['title' => 'A place to stay',        'text' => 'Free Wi-Fi, outlets at every table, and a calm space to study, work, or catch up.'],
    ];
@endphp

@section('content')
<div class="about-page">

    {{-- Background / story --}}
    <section class="about-hero" aria-labelledby="about-title">
        <div class="about-wrap about-hero-grid">
            <div class="about-hero-text">
                <p class="about-eyebrow">About Git Brew</p>
                <h1 id="about-title">A small café that takes every cup seriously.</h1>

                <div class="about-story">
                    <p class="about-lead">
                        Git Brew is a neighborhood café serving freshly roasted coffee, simple pastries,
                        and a quiet table for anyone who needs one. We started with one idea: good coffee
                        should be affordable, consistent, and made with care.
                    </p>

                    <div class="story-more is-collapsed" id="story-more" inert>
                        <div class="story-more-inner">
                            <p>
                                The name comes from where we started: a group of students who spent long nights
                                coding over cups of coffee. We wanted a place that felt like that study table —
                                warm, welcoming, and open to everyone — so we built it.
                            </p>
                            <p>
                                Today we roast our beans in small batches every morning, bake our pastries
                                in-house, and keep the menu short so every item gets our full attention.
                                Whether you're grabbing a quick espresso or settling in for an afternoon of work,
                                we want Git Brew to be the place you're happy to come back to.
                            </p>
                        </div>
                    </div>

                    <button type="button" class="about-btn about-btn-outline" id="story-toggle"
                            aria-expanded="false" aria-controls="story-more">
                        <span data-toggle-label>Read More</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="about-btn-icon" aria-hidden="true">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>
                </div>
            </div>

            <aside class="about-facts" aria-label="Git Brew at a glance">
                <div class="about-fact">
                    <span class="about-fact-value">Daily</span>
                    <span class="about-fact-label">Fresh roasts &amp; bakes</span>
                </div>
                <div class="about-fact">
                    <span class="about-fact-value">Short</span>
                    <span class="about-fact-label">Menu, made to order</span>
                </div>
                <div class="about-fact">
                    <span class="about-fact-value">Student</span>
                    <span class="about-fact-label">Friendly prices</span>
                </div>
            </aside>
        </div>
    </section>

    {{-- Services --}}
    <section class="about-section about-wrap" aria-labelledby="services-title">
        <h2 id="services-title" class="about-heading">What we offer</h2>
        <div class="services-grid">
            @foreach ($services as $service)
                <article class="service-card">
                    <h3>{{ $service['title'] }}</h3>
                    <p>{{ $service['text'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    {{-- Mission & Vision --}}
    <section class="about-section about-wrap" aria-labelledby="mv-title">
        <h2 id="mv-title" class="about-heading">What drives us</h2>
        <div class="mv-grid">
            <article class="mv-card mv-mission">
                <span class="mv-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="9" /><circle cx="12" cy="12" r="5" /><circle cx="12" cy="12" r="1" />
                    </svg>
                </span>
                <h3>Our Mission</h3>
                <p>
                    To serve fresh, carefully made coffee and pastries at fair prices, in a welcoming space
                    where students, workers, and neighbors can slow down, focus, and connect.
                </p>
            </article>

            <article class="mv-card mv-vision">
                <span class="mv-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z" /><circle cx="12" cy="12" r="3" />
                    </svg>
                </span>
                <h3>Our Vision</h3>
                <p>
                    To become the community's favorite third place — known for consistent quality,
                    friendly service, and a table that's always ready for the next idea.
                </p>
            </article>
        </div>
    </section>

    {{-- Team --}}
    <section class="about-section about-wrap" aria-labelledby="team-title">
        <h2 id="team-title" class="about-heading">Meet the team</h2>
        <p class="about-intro">The people behind the counter. <span class="about-note">(Names are placeholders until staff details are confirmed.)</span></p>

        <div class="team-grid">
            @foreach ($team as $member)
                <article class="team-card">
                    <div class="team-avatar">
                        @if ($member['photo'])
                            <img src="{{ asset('images/team/' . $member['photo']) }}" alt="Photo of {{ $member['name'] }}">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="8" r="4" /><path d="M4 21a8 8 0 0 1 16 0" />
                            </svg>
                        @endif
                    </div>
                    <h3>{{ $member['name'] }}</h3>
                    <p class="team-role">{{ $member['role'] }}</p>
                    <p class="team-bio">{{ $member['bio'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/about.js') }}"></script>
@endpush
