@extends('layouts.app')

@section('title', 'Home | Git Brew Café')

@section('content')
    <section class="relative overflow-hidden border-b">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_15%_20%,rgba(245,138,60,0.20),transparent_45%),radial-gradient(circle_at_85%_15%,rgba(154,100,64,0.18),transparent_45%)]"></div>

        <div class="relative mx-auto w-full max-w-6xl px-6 py-20 sm:py-24 lg:grid-cols-2 lg:py-28">
            <div>
                <span class="badge border-border bg-card/80 text-muted-foreground backdrop-blur">
                    <span class="mr-2 size-1.5 rounded-full bg-accent"></span>
                    Freshly roasted, every morning
                </span>

                <h1 class="mt-6 max-w-xl text-4xl font-semibold tracking-tight text-balance sm:text-5xl lg:text-6xl">
                    Fresh coffee, committed to every cup.
                </h1>

                <p class="mt-6 max-w-xl text-base text-muted-foreground sm:text-lg">
                    Git Brew is a neighborhood café serving freshly roasted coffee, simple pastries, and a quiet table to work, study, or catch up with friends.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <a href="{{ url('/about') }}" class="btn btn-primary">Meet the team</a>
                    <a href="{{ url('/contact') }}" class="btn btn-ghost">Find us</a>
                    <a href="#menu" class="btn btn-accent">Menu</a>
                </div>

                <dl class="mt-10 grid max-w-md grid-cols-3 gap-6 border-t pt-6">
                    <div>
                        <dt class="text-xs font-semibold tracking-wider text-muted-foreground uppercase">Open</dt>
                        <dd class="mt-1 text-sm font-semibold">7am – 8pm</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold tracking-wider text-muted-foreground uppercase">Roasts</dt>
                        <dd class="mt-1 text-sm font-semibold">Small batch</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-semibold tracking-wider text-muted-foreground uppercase">Bakes</dt>
                        <dd class="mt-1 text-sm font-semibold">Made daily</dd>
                    </div>
                </dl>
            </div>

            <div class="relative mx-auto w-full max-w-md">
                <div class="absolute -top-4 -right-2 z-10 rotate-3 rounded-lg border bg-card px-3 py-2 text-xs font-semibold shadow-sm sm:-right-4">
                    Single origin
                </div>
                <div class="absolute -bottom-4 -left-2 z-10 -rotate-2 rounded-lg border bg-card px-3 py-2 text-xs font-semibold shadow-sm sm:-left-4">
                    Baked fresh at 6am
                </div>

                <div class="relative aspect-square overflow-hidden rounded-3xl border bg-card shadow-sm">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_35%,rgba(245,138,60,0.28),transparent_60%)]"></div>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 320" class="absolute inset-0 size-full" role="img" aria-label="A warm cup of coffee with steam">
                        <ellipse cx="160" cy="272" rx="92" ry="12" fill="currentColor" class="text-border" />
                        <path d="M96 132h128v44a64 64 0 0 1-64 64 64 64 0 0 1-64-64v-44Z" fill="#9a6440" />
                        <path d="M110 146h100v30a50 50 0 0 1-50 50 50 50 0 0 1-50-50v-30Z" fill="#2a1f18" />
                        <path d="M224 142h18a28 28 0 0 1 0 56h-18" fill="none" stroke="#9a6440" stroke-width="12" stroke-linecap="round" />
                        <path d="M130 118c0-12 10-12 10-24M160 118c0-12 10-12 10-24M190 118c0-12 10-12 10-24" fill="none" stroke="#f58a3c" stroke-width="7" stroke-linecap="round" class="opacity-80" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto w-full max-w-6xl px-6 py-16 sm:py-20">
        <div class="max-w-2xl">
            <p class="text-xs font-semibold tracking-[0.2em] text-muted-foreground uppercase">Our menu</p>
            <h2 class="mt-4 text-2xl font-semibold tracking-tight sm:text-3xl">Simple things, made with care.</h2>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            <article class="card">
                <div class="card-header">
                    <div class="flex size-10 items-center justify-center rounded-lg bg-accent/15 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5" aria-hidden="true">
                            <path d="M17 8h1a4 4 0 1 1 0 8h-1" />
                            <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z" />
                        </svg>
                    </div>
                    <h3 class="card-title mt-4">Small-batch roasts</h3>
                    <p class="card-description">
                        Beans roasted in small batches so every cup tastes fresh, balanced, and full of character.
                    </p>
                </div>
            </article>

            <article class="card">
                <div class="card-header">
                    <div class="flex size-10 items-center justify-center rounded-lg bg-accent/15 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5" aria-hidden="true">
                            <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                        </svg>
                    </div>
                    <h3 class="card-title mt-4">Handcrafted drinks</h3>
                    <p class="card-description">
                        From a classic flat white to a slow-steeped pour-over, each drink is made to order.
                    </p>
                </div>
            </article>

            <article class="card">
                <div class="card-header">
                    <div class="flex size-10 items-center justify-center rounded-lg bg-accent/15 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5" aria-hidden="true">
                            <path d="M4 13h16M6 13a6 6 0 0 1 12 0M12 7V4M8.5 4h7" />
                        </svg>
                    </div>
                    <h3 class="card-title mt-4">Fresh bakes</h3>
                    <p class="card-description">
                        Pastries and breads pulled from the oven each morning, because coffee deserves company.
                    </p>
                </div>
            </article>
        </div>
    </section>
@endsection