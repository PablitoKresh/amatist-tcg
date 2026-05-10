@extends('layouts.app')

@section('title', config('app.name'))

@push('styles')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="hero-wrapper position-relative overflow-hidden text-center text-white py-5 mb-5">
        <video autoplay muted loop playsinline id="hero-video" class="position-absolute w-100 h-100">
            <source src="{{ asset('video/hero-bg.mp4') }}" type="video/mp4">
        </video>
        
        <div class="container py-5">
            <h1 class="hero-title display-3 fw-bold mb-3">
                Amatist <span class="text-accent">TCG</span>
            </h1>
            <p class="lead mb-4 fs-4 text-light opacity-75" style="text-shadow: 0 2px 4px rgba(0,0,0,0.5);">
                {{ __('messages.slogan') }}
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('catalogo') }}" class="btn-glass px-5 py-3 text-decoration-none">
                    {{ __('messages.view_catalog') }}
                </a>
                <a href="{{ route('register') }}" class="btn-outline-glass px-5 py-3 text-white text-decoration-none">
                    {{ __('messages.register') }}
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <section class="row row-cols-1 row-cols-md-3 g-4 mt-5">
            <div class="col">
                <a href="{{ route('catalogo') }}?categoria=magic-the-gathering" class="card-interactive">
                    <video class="card-video" muted loop playsinline preload="auto">
                        <source src="{{ asset('video/magic-bg.mp4') }}" type="video/mp4">
                    </video>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <h3>{{ __('messages.magic_title') }}</h3>
                        <p>{{ __('messages.magic_desc') }}</p>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="{{ route('catalogo') }}?categoria=pokemon" class="card-interactive">
                    <video class="card-video" muted loop playsinline preload="auto">
                        <source src="{{ asset('video/pokemon-bg.mp4') }}" type="video/mp4">
                    </video>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <h3>Pokémon TCG</h3>
                        <p>{{ __('messages.pokemon_desc') }}</p>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="{{ route('catalogo') }}?categoria=yu-gi-oh" class="card-interactive">
                    <video class="card-video" muted loop playsinline preload="auto">
                        <source src="{{ asset('video/yugioh-bg.mp4') }}" type="video/mp4">
                    </video>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <h3>{{ __('messages.yugioh_title') }}</h3>
                        <p>{{ __('messages.yugioh_desc') }}</p>
                    </div>
                </a>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("Sistema de vídeo Amatist: Activado ✅");
            
            const cards = document.querySelectorAll('.card-interactive');
            
            cards.forEach(card => {
                const video = card.querySelector('.card-video');
                
                card.addEventListener('mouseenter', function() {
                    console.log("Reproduciendo...");
                    if (video) {
                        video.play().catch(error => {
                            console.warn("Auto-play bloqueado por el navegador:", error);
                        });
                    }
                });

                card.addEventListener('mouseleave', function() {
                    if (video) {
                        video.pause();
                        video.currentTime = 0;
                    }
                });
            });
        });
    </script>
@endsection