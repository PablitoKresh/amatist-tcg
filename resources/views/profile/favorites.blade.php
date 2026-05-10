@extends('layouts.app')

@section('title', 'Mis Favoritos - Amatist TCG')

@section('content')
<div class="container py-5">
    <div class="d-flex align-items-center mb-5">
        <h1 class="fw-bold me-3">Mis <span class="text-danger">Favoritos</span></h1>
        <div class="flex-grow-1 border-bottom border-danger opacity-25"></div>
    </div>

    @if($favorites->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-heartbreak text-secondary display-1"></i>
            <p class="text-muted mt-3 fs-4">Aún no tienes cartas favoritas.</p>
            <a href="{{ route('catalogo') }}" class="btn btn-primary mt-3 px-4 rounded-pill">Explorar Catálogo</a>
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($favorites as $producto)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 position-relative">
                        <form action="{{ route('favorites.toggle', $producto->id) }}" method="POST" class="position-absolute top-0 end-0 m-2">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm rounded-circle">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                        </form>

                        <img src="{{ asset('img/' . $producto->image) }}" class="card-img-top p-3" style="height: 200px; object-fit: contain;">
                        
                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $producto->name }}</h5>
                            <p class="text-primary fw-bold">{{ number_format($producto->price, 2) }}€</p>
                            <a href="{{ route('catalogo') }}" class="btn btn-outline-primary btn-sm rounded-pill w-100">Ver en catálogo</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection