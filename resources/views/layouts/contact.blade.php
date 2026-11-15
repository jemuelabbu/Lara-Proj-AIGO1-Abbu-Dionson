@extends('layouts.app')

@section('title', 'Contacts')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@php
    // Contact details: these are PLACEHOLDERS — replace them with the real café details.
    $hours = [
        ['days' => 'Monday – Friday', 'time' => '7:00 AM – 9:00 PM'],
        ['days' => 'Saturday',        'time' => '8:00 AM – 10:00 PM'],
        ['days' => 'Sunday',          'time' => '8:00 AM – 6:00 PM'],
    ];
@endphp

@section('content')
<div class="contact-page">

    <section class="contact-hero" aria-labelledby="contact-title">
        <div class="contact-wrap">
            <p class="contact-eyebrow">Contact us</p>
            <h1 id="contact-title">Let's talk over coffee.</h1>
            <p class="contact-lead">
                Send us a message or drop by the café.
            </p>
        </div>
    </section>

    <div class="contact-wrap contact-grid">

        {{-- Contact form (client-side validation only, see public/js/contact.js) --}}
        <section class="contact-card contact-form-card" aria-labelledby="form-title">
            <h2 id="form-title">Send a message</h2>
            <p class="contact-muted">All fields are required.</p>

            <div class="form-success" id="form-success" role="status" aria-live="polite" hidden>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="10" /><path d="m8 12 3 3 5-6" />
                </svg>
                <div>
                    <strong>Your message passed validation!</strong>
                    <span>All fields look good. This is a demo form, so no message was actually sent.</span>
                </div>
            </div>

            <form id="contact-form" class="contact-form" novalidate>
                <div class="form-row">
                    <div class="form-field">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" autocomplete="name" placeholder="Juan Dela Cruz"
                               required aria-describedby="name-error">
                        <p class="form-error" id="name-error"></p>
                    </div>

                    <div class="form-field">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" autocomplete="email" placeholder="you@example.com"
                               required aria-describedby="email-error">
                        <p class="form-error" id="email-error"></p>
                    </div>
                </div>

                <div class="form-field">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="What is this about?"
                           required aria-describedby="subject-error">
                    <p class="form-error" id="subject-error"></p>
                </div>

                <div class="form-field">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="6" placeholder="Write your message here..."
                              required aria-describedby="message-error"></textarea>
                    <p class="form-error" id="message-error"></p>
                </div>

                <button type="submit" class="contact-btn">
                    Send Message
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M22 2 11 13" /><path d="M22 2 15 22l-4-9-9-4 20-7Z" />
                    </svg>
                </button>
            </form>
        </section>

        {{-- Contact information (placeholders) --}}
        <aside class="contact-info" aria-labelledby="info-title">
            <div class="contact-card">
                <h2 id="info-title">Visit or reach us </h2>

                <ul class="info-list">
                    <li>
                        <span class="info-icon" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2" /><path d="m22 7-10 6L2 7" /></svg>
                        </span>
                        <div>
                            <span class="info-label">Email</span>
                            <a href="mailto:gitbrewcafe@gmail.com">gitbrewcafe@gmail.com</a>
                        </div>
                    </li>
                    <li>
                        <span class="info-icon" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2Z" /></svg>
                        </span>
                        <div>
                            <span class="info-label">Phone</span>
                            <a href="tel:+630000000000">+63 970 9683 408</a>
                        </div>
                    </li>
                    <li>
                        <span class="info-icon" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" /><circle cx="12" cy="10" r="3" /></svg>
                        </span>
                        <div>
                            <span class="info-label">Address</span>
                            <address>Purok 6, Ampayon,<br>Butuan City, Agusan del Norte 8600</address>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="contact-card">
                <h2>Business hours</h2>
                <dl class="hours-list">
                    @foreach ($hours as $row)
                        <div>
                            <dt>{{ $row['days'] }}</dt>
                            <dd>{{ $row['time'] }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </aside>

    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endpush
