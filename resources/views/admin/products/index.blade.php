@extends('layouts.app')

@section('title', __('messages.product_management'))

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2 fw-bold">{{ __('messages.product_management') }}</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary shadow-sm px-4">
            {{ __('messages.add_product') }}
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>{{ __('messages.image') }}</th>
                        <th>{{ __('messages.name') }}</th>
                        <th>{{ __('messages.category') }}</th>
                        <th>{{ __('messages.price') }}</th>
                        <th>Stock</th> <th class="text-end pe-4">{{ __('messages.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td class="ps-4 text-muted">#{{ $producto->id }}</td>
                            <td>
                                @if ($producto->image)
                                    <img src="{{ asset('img/' . $producto->image) }}" 
                                         alt="{{ $producto->name }}" 
                                         class="rounded shadow-sm" 
                                         style="width: 50px; height: auto;">
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary small">{{ __('messages.no_image') }}</span>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $producto->name }}</td>
                            <td>
                                @forelse($producto->categories as $categoria)
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill">
                                        {{ $categoria->name }}
                                    </span>
                                @empty
                                    <span class="text-muted small fst-italic">Sin categoría</span>
                                @endforelse
                            </td>
                            <td class="fw-bold text-dark">
                                {{ number_format($producto->price, 2) }}€
                            </td>
                            <td>
                                @if($producto->stock <= 0)
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle">Agotado</span>
                                @elseif($producto->stock <= 5)
                                    <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle">
                                        Bajo: {{ $producto->stock }}
                                    </span>
                                @else
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">
                                        {{ $producto->stock }} uds.
                                    </span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group shadow-sm">
                                    <a href="{{ route('admin.products.edit', $producto->id) }}" class="btn btn-sm btn-white border">
                                        {{ __('messages.edit') }}
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $producto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-white border text-danger" onclick="return confirm('{{ __('messages.confirm_delete_product') }}')">
                                            {{ __('messages.delete') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection