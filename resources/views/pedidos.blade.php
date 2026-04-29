@extends('layouts.app')

@section('title', 'Mis pedidos')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Mis pedidos</h1>

    @php
        $colors = [
            'pendiente'  => 'bg-warning text-dark',
            'preparando' => 'bg-info text-dark',
            'enviado'    => 'bg-primary',
            'entregado'  => 'bg-success',
            'cancelado'  => 'bg-danger',
        ];
    @endphp

    @foreach($orders as $order)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Pedido #{{ $order->id }}</h5>
                
                <p class="mb-1"><strong>Total:</strong> {{ $order->total }}€</p>
                <p class="mb-1">
                    <strong>Estado:</strong> 
                    <span class="badge {{ $colors[$order->status] ?? 'bg-secondary' }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </p>

                <p class="text-muted small mb-0">
                    Fecha: {{ $order->created_at }}
                </p>
                <hr>

                <h6>Productos:</h6>

                @foreach($order->items as $item)
                    <p class="mb-1">
                        {{ $item->product->name }} - {{ $item->price }}€
                    </p>
                @endforeach
            </div>
        </div>
    @endforeach

</div>
@endsection