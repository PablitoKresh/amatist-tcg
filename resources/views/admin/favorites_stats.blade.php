@extends('layouts.app')

@section('title', __('messages.favorites_stats_title'))

@section('content')
<div class="container py-5">
    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white p-4">
            <h2 class="mb-0 h4"><i class="bi bi-graph-up-arrow me-2 text-info"></i>{{ __('messages.top_favorites') }}</h2>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-secondary">
                    <tr>
                        <th class="ps-4">{{ __('messages.position') }}</th>
                        <th>{{ __('messages.image') }}</th>
                        <th>{{ __('messages.product_name') }}</th>
                        <th class="text-center">{{ __('messages.times_favorited') }}</th>
                        <th>{{ __('messages.stock_status') }}</th>
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
                                <span class="text-success small"><i class="bi bi-check-circle"></i> {{ __('messages.available') }}</span>
                            @else
                                <span class="text-danger small"><i class="bi bi-x-circle"></i> {{ __('messages.out_of_stock') }}</span>
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