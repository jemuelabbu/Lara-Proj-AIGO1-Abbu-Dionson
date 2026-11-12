@extends('layouts.app')

@section('title', 'Home')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@php
    // Menu data: edit an item here. Photos go in public/images/menu/
    $drinks = [
        ['name' => 'Espresso',          'photo' => 'espresso.jpg',          'price' => 90,  'desc' => 'A double shot of our house roast, pulled fresh to order.'],
        ['name' => 'Cappuccino',        'photo' => 'cappuccino.jpg',        'price' => 120, 'desc' => 'Espresso with steamed milk and a thick layer of foam.'],
        ['name' => 'Iced Latte',        'photo' => 'iced-latte.jpg',        'price' => 130, 'desc' => 'Chilled espresso and milk over ice, lightly sweet.'],
        ['name' => 'Caramel Macchiato', 'photo' => 'caramel-macchiato.jpg', 'price' => 140, 'desc' => 'Vanilla milk, espresso, and a caramel drizzle.'],
        ['name' => 'Matcha Latte',      'photo' => 'matcha-latte.jpg',      'price' => 150, 'desc' => 'Stone-ground matcha whisked with steamed milk.'],
         ['name' => 'Calamansi Ade',     'photo' => 'calamansi-ade.jpg',     'price' => 95,  'desc' => 'Fresh calamansi juice over ice, sweet and sour. It\'s the refreshing one, and it has a local touch.'],
        ['name' => 'Iced Mocha',        'photo' => 'iced-mocha.jpg',        'price' => 140, 'desc' => 'Espresso, chocolate and cold milk over ice.'],
        ['name' => 'Hot Chocolate',     'photo' => 'hot-chocolate.jpg',     'price' => 110, 'desc' => 'Thick chocolate with steamed milk, for people who don\'t drink coffee.'],
    ];

    $pastries = [
        ['name' => 'Butter Croissant',      'photo' => 'croissant.jpg',       'price' => 85,  'desc' => 'Flaky, golden, and baked fresh every morning.'],
        ['name' => 'Chocolate Croissant',   'photo' => 'choco-croissant.jpg', 'price' => 95,  'desc' => 'Our croissant with a bar of dark chocolate inside.'],
        ['name' => 'Cinnamon Roll',         'photo' => 'cinnamon-roll.jpg',   'price' => 110, 'desc' => 'Soft roll swirled with cinnamon and topped with icing.'],
        ['name' => 'Banana Bread',          'photo' => 'banana-bread.jpg',    'price' => 90,  'desc' => 'Moist, lightly sweet, and best with a hot coffee.'],
        ['name' => 'Chocolate Chip Cookie', 'photo' => 'cookie.jpg',          'price' => 70,  'desc' => 'Crisp edges, a soft middle, and melted chocolate.'],
    ];
@endphp

@section('content')
<div class="home-page">

    <section class="hero">
        <div class="wrap hero-grid">
            <div class="hero-text">
                <h1>Fresh coffee, committed to every cup.</h1>
                <p>Git Brew is a neighborhood café serving freshly roasted coffee, simple pastries, and a quiet table to work, study, or catch up with friends.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="{{ url('/about') }}">Meet the team</a>
                    <a class="btn btn-ghost" href="{{ url('/contact') }}">Find us</a>
                    <a class="btn btn-accent" href="#menu">Menu</a>
                </div>
            </div>

            {{-- PHOTO: public/images/hero.jpg --}}
            <div class="photo-slot photo-hero">
                <img src="{{ asset('images/hero.jpg') }}" alt="Coffee served at Git Brew" onerror="this.remove()">
                <span>Add photo<br><small>images/hero.jpg</small></span>
            </div>
        </div>
    </section>

    <section class="menu wrap" id="menu">
        <h2>Our menu</h2>
        <p class="menu-intro">Fresh drinks and fresh-baked pastries. Everything is made to order, so pull up a chair and stay a while.</p>

        @foreach (['Drinks' => $drinks, 'Pastries' => $pastries] as $group => $items)
            <h3 class="menu-group">{{ $group }}</h3>
            <div class="item-grid">
                @foreach ($items as $item)
                    <article class="item reveal">
                        <div class="photo-slot">
                            <img src="{{ asset('images/menu/' . $item['photo']) }}" alt="{{ $item['name'] }}" onerror="this.remove()">
                            <span>Add photo<br><small>images/menu/{{ $item['photo'] }}</small></span>
                        </div>
                        <div class="item-body">
                            <h4>{{ $item['name'] }}</h4>
                            <p>{{ $item['desc'] }}</p>
                            <span class="price">&#8369;{{ $item['price'] }}</span>
                        </div>
                    </article>
                @endforeach
            </div>
        @endforeach
    </section>

    <section class="highlights wrap">
        <h2>Why people come back</h2>
        <div class="highlight-list">
            <article class="reveal">
                <h3>Fresh roasts</h3>
                <p>Beans are roasted every morning, so your cup is never made from week-old coffee.</p>
            </article>
            <article class="reveal">
                <h3>Simple menu</h3>
                <p>A short list of coffee, tea, and pastries, made fresh and priced for students.</p>
            </article>
            <article class="reveal">
                <h3>A place to stay</h3>
                <p>Free Wi-Fi, outlets at every table, and nobody rushing you out the door.</p>
            </article>
        </div>
    </section>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
