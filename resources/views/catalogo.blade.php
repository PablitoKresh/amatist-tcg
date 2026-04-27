@extends('layouts.app')

@section('title', 'Catálogo - Amatist TCG')

@section('content')
<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="mb-5 text-center display-5 fw-bold">
        Catálogo <span class="text-primary">Amatist</span>
    </h1>

    {{-- POKÉMON --}}
    <section class="mb-5">
        <div class="d-flex align-items-center mb-4">
            <h2 class="me-3">Pokémon TCG</h2>
            <div class="flex-grow-1 border-bottom"></div>
        </div>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($productos->where('category', 'Pokemon') as $producto)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">

                        <img src="{{ asset('img/' . $producto->image) }}"
                             class="card-img-top"
                             alt="{{ $producto->name }}">

                        <div class="card-body">
                            <h5 class="card-title text-truncate">
                                {{ $producto->name }}
                            </h5>

                            <p class="card-text text-muted small">
                                {{ $producto->description }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-primary fw-bold fs-5">
                                    {{ $producto->price }}€
                                </span>

                                <form action="/comprar/{{ $producto->id }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-primary">
                                        Añadir
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- YU-GI-OH --}}
    <section class="mb-5">
        <div class="d-flex align-items-center mb-4">
            <h2 class="me-3">Yu-Gi-Oh!</h2>
            <div class="flex-grow-1 border-bottom border-danger"></div>
        </div>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($productos->where('category', 'Yugioh') as $producto)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">

                        <img src="{{ asset('img/' . $producto->image) }}"
                             class="card-img-top"
                             alt="{{ $producto->name }}">

                        <div class="card-body">
                            <h5 class="card-title text-truncate">
                                {{ $producto->name }}
                            </h5>

                            <p class="card-text text-muted small">
                                {{ $producto->description }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-danger fw-bold fs-5">
                                    {{ $producto->price }}€
                                </span>

                                <form action="/comprar/{{ $producto->id }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">
                                        Añadir
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </section>

</div>
@endsection