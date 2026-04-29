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
                <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="d-flex align-items-center gap-2 mb-3">
                    @csrf
                    @method('PATCH')

                    <label class="me-1 mb-0"><strong>Estado:</strong></label>

                    <select name="status" class="form-select form-select-sm w-auto">
                        <option value="pendiente"  @selected($order->status === 'pendiente')>Pendiente</option>
                        <option value="preparando" @selected($order->status === 'preparando')>Preparando</option>
                        <option value="enviado"    @selected($order->status === 'enviado')>Enviado</option>
                        <option value="entregado"  @selected($order->status === 'entregado')>Entregado</option>
                        <option value="cancelado"  @selected($order->status === 'cancelado')>Cancelado</option>
                    </select>

                    <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
                </form>

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