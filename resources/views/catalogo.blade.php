@extends('layouts.app')

@section('title', 'Catálogo - Amatist TCG')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center">Nuestra Colección de Cartas</h2>
        <hr>
        <div class="row row-cols-1 row-cols-md-4 g-4 mt-2">
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/200x280?text=CARTA+TCG" class="card-img-top" alt="Carta">
                    <div class="card-body">
                        <h5 class="card-title">Mago Oscuro</h5>
                        <p class="card-text text-muted">Edición especial limitada.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-primary fw-bold">19.99 €</span>
                            <button class="btn btn-sm btn-primary">Añadir</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
@endsection
