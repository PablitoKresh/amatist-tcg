@extends('layouts.app')

@section('title', 'Estadísticas de Favoritos - Admin')

@section('content')
<div class="container py-5">
    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white p-4">
            <h2 class="mb-0 h4"><i class="bi bi-graph-up-arrow me-2 text-info"></i>Productos más deseados (Top 10)</h2>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-secondary">
                    <tr>
                        <th class="ps-4">Posición</th>
                        <th>Imagen</th>
                        <th>Nombre del Producto</th>
                        <th class="text-center">Veces en Favoritos</th>
                        <th>Estado de Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topFavoritos as $index => $producto)
                    <tr>
                        <td class="ps-4 fw-bold">#{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ asset('img/' . $producto->image) }}" width="40" class="rounded shadow-sm">
                        </td>
                        <td class="fw-bold">{{ $producto->name }}</td>
                        <td class="text-center">
                            <span class="badge bg-danger rounded-pill px-3">
                                <i class="bi bi-heart-fill me-1"></i> {{ $producto->favorited_by_count }}
                            </span>
                        </td>
                        <td>
                            @if($producto->stock > 0)
                                <span class="text-success small"><i class="bi bi-check-circle"></i> Disponible</span>
                            @else
                                <span class="text-danger small"><i class="bi bi-x-circle"></i> Agotado</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection