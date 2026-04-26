@extends('layouts.app')

@section('title', 'Catálogo - Amatist TCG')

@section('content')
    <div class="container py-5">
        <h1 class="mb-5 text-center display-5 fw-bold">Catálogo <span class="text-primary">Amatist</span></h1>

        <section class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <h2 class="me-3">Pokémon TCG</h2>
                <div class="flex-grow-1 border-bottom"></div>
            </div>
            
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('img/charizard.jpg') }}" class="card-img-top" alt="Charizard">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">Charizard 1999 (BS 4)</h5>
                            <p class="card-text text-muted small">1ª Edición y Base set.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-primary fw-bold fs-5">265€</span>
                                <button class="btn btn-sm btn-primary">Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('img/venusaur.jpg') }}" class="card-img-top" alt="Venusaur">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">Venusaur 1999 (BS 15)</h5>
                            <p class="card-text text-muted small">1ª Edición y Base set.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-primary fw-bold fs-5">98€</span>
                                <button class="btn btn-sm btn-primary">Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('img/blastoise.png') }}" class="card-img-top" alt="Blastoise">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">Blastoise 1999 (BS 2)</h5>
                            <p class="card-text text-muted small">1ª Edición y Base set.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-primary fw-bold fs-5">150€</span>
                                <button class="btn btn-sm btn-primary">Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('img/alakazam.png') }}" class="card-img-top" alt="Alakazam">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">Alakazam 1999 (BS 1)</h5>
                            <p class="card-text text-muted small">1ª Edición y Base set.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-primary fw-bold fs-5">73€</span>
                                <button class="btn btn-sm btn-primary">Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <h2 class="me-3">Yu-Gi-Oh!</h2>
                <div class="flex-grow-1 border-bottom border-danger"></div>
            </div>

            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('img/blue_eyes.webp') }}" class="card-img-top" alt="Blue Eyes">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">Dragón Blanco de Ojos Azules</h5>
                            <p class="card-text text-muted small">Leyenda del Dragón Blanco.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-danger fw-bold fs-5">120€</span>
                                <button class="btn btn-sm btn-danger">Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('img/dark_magician.jpg') }}" class="card-img-top" alt="Mago Oscuro">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">Mago Oscuro</h5>
                            <p class="card-text text-muted small">El mago definitivo en ataque y defensa.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-danger fw-bold fs-5">85€</span>
                                <button class="btn btn-sm btn-danger">Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('img/red_eyes.webp') }}" class="card-img-top" alt="Red Eyes">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">Dragón Negro de Ojos Rojos</h5>
                            <p class="card-text text-muted small">Un dragón feroz con un ataque letal.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-danger fw-bold fs-5">110€</span>
                                <button class="btn btn-sm btn-danger">Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('img/exodia.webp') }}" class="card-img-top" alt="Exodia">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">SET Exodia, el Prohibido</h5>
                            <p class="card-text text-muted small">¡Gana el duelo automáticamente!</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-danger fw-bold fs-5">999€</span>
                                <button class="btn btn-sm btn-danger">Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection