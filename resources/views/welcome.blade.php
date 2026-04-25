@extends('layouts.app')

@section('title', 'Bienvenido a ' . config('app.name'))

@section('content')
    <section class="text-center py-5">
        <h1 class="display-4 mb-3">
            Amatist <span class="text-primary">TCG</span>
        </h1>
        <p class="lead text-secondary">El poder está en tus manos</p>
        <p class="mt-4">
            <a href="{{ route('catalogo') }}" class="btn btn-primary btn-lg me-2">Ver catálogo</a>
            <a href="#" class="btn btn-outline-primary btn-lg">Registrarse</a>
        </p>
    </section>

    <section class="row row-cols-1 row-cols-md-3 g-4 mt-5">
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Magic: The Gathering</h5>
                    <p class="card-text text-muted">Sobres, barajas precon, cartas sueltas y accesorios.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Pokémon TCG</h5>
                    <p class="card-text text-muted">Elite Trainer Boxes, sobres y promos oficiales.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Yu-Gi-Oh! & más</h5>
                    <p class="card-text text-muted">Mazos estructurales, boosters y rarezas de colección.</p>
                </div>
            </div>
        </div>
    </section>
@endsection