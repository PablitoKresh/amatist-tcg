@extends('layouts.app')

@section('title', __('messages.catalog') . ' - Amatist TCG')

@section('content')
<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success shadow-sm border-0 alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1 class="mb-5 text-center display-5 fw-bold">
        {{ __('messages.catalog') }} <span class="text-primary">Amatist</span>
    </h1>

    @forelse($categorias as $categoria)
        <section class="mb-5">
            <div class="d-flex align-items-center mb-4">
                <h2 class="me-3 fw-bold">{{ $categoria->name }}</h2>
                <div class="flex-grow-1 border-bottom border-primary opacity-25"></div>
            </div>

            @if($categoria->products->isEmpty())
                <p class="text-muted fst-italic">
                    {{ __('messages.no_products_category') }}
                </p>
            @else
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach($categoria->products as $producto)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0 transition-hover overflow-hidden">
                                
                                @auth
                                    <div class="position-absolute top-0 end-0 m-3" style="z-index: 2;">
                                        <form action="{{ route('favorites.toggle', $producto->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-light btn-sm rounded-circle shadow-sm border-0 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                                @if(auth()->user()->favorites->contains($producto->id))
                                                    <i class="bi bi-heart-fill text-danger fs-5"></i>
                                                @else
                                                    <i class="bi bi-heart text-secondary fs-5"></i>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                @endauth

                                <div class="bg-light p-3" style="height: 250px;">
                                    <img src="{{ asset('img/' . $producto->image) }}"
                                         class="w-100 h-100"
                                         alt="{{ $producto->name }}"
                                         style="object-fit: contain;">
                                </div>
                                
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-truncate fw-bold mb-1">
                                        {{ $producto->name }}
                                    </h5>
                                    
                                    <p class="card-text text-muted small mb-3">
                                        {{ __('messages.' . \Illuminate\Support\Str::slug($producto->name, '_') . '_desc') }}
                                    </p>

                                    <div class="mb-3">
                                        @if($producto->stock > 5)
                                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">
                                                Stock: {{ $producto->stock }} uds.
                                            </span>
                                        @elseif($producto->stock > 0)
                                            <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle rounded-pill">
                                                ¡Solo quedan {{ $producto->stock }}!
                                            </span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill">
                                                Agotado
                                            </span>
                                        @endif
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <span class="text-primary fw-bold fs-5">
                                            {{ number_format($producto->price, 2) }}€
                                        </span>
                                        
                                        <form action="/comprar/{{ $producto->id }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-primary px-3 rounded-pill" {{ $producto->stock <= 0 ? 'disabled' : '' }}>
                                                @if($producto->stock > 0)
                                                    <i class="bi bi-cart-plus me-1"></i> {{ __('messages.buy') }}
                                                @else
                                                    Sin Stock
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    @empty
        <div class="alert alert-info text-center border-0 shadow-sm">
            {{ __('messages.no_categories') }}
        </div>
    @endforelse

</div>
@endsection