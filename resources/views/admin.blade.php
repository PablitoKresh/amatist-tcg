@extends('layouts.app')

@section('title', 'Panel Admin')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Panel de Administración</h1>

    <h3>Pedidos de usuarios</h3>

    @foreach($orders as $order)
        <div class="card mb-3">
            <div class="card-body">
                <h5>Pedido #{{ $order->id }}</h5>

                <p><strong>Usuario:</strong> {{ $order->user->name }}</p>
                <p><strong>Total:</strong> {{ $order->total }}€</p>
                <p><strong>Estado:</strong> {{ $order->status }}</p>

                <strong>Productos:</strong>
                <ul>
                    @foreach($order->items as $item)
                        <li>{{ $item->product->name }} - {{ $item->price }}€</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach

</div>
@endsection