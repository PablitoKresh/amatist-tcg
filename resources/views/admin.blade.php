@extends('layouts.app')

@section('title', __('messages.admin_panel'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('messages.admin_panel') }}</h1>

    <h3>{{ __('messages.user_orders') }}</h3>

    @foreach($orders as $order)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ __('messages.order') }} #{{ $order->id }}</h5>

                <p><strong>{{ __('messages.user') }}:</strong> {{ $order->user->name }}</p>
                <p><strong>{{ __('messages.total') }}:</strong> {{ $order->total }}€</p>
                <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="d-flex align-items-center gap-2 mb-3">
                    @csrf
                    @method('PATCH')

                    <label class="me-1 mb-0"><strong>{{ __('messages.status') }}:</strong></label>

                    <select name="status" class="form-select form-select-sm w-auto">
                        <option value="pendiente" @selected($order->status === 'pendiente')>
                            {{ __('messages.pendiente') }}
                        </option>

                        <option value="preparando" @selected($order->status === 'preparando')>
                            {{ __('messages.preparando') }}
                        </option>

                        <option value="enviado" @selected($order->status === 'enviado')>
                            {{ __('messages.enviado') }}
                        </option>

                        <option value="entregado" @selected($order->status === 'entregado')>
                            {{ __('messages.entregado') }}
                        </option>

                        <option value="cancelado" @selected($order->status === 'cancelado')>
                            {{ __('messages.cancelado') }}
                        </option>
                    </select>

                    <button type="submit" class="btn btn-sm btn-primary">
                        {{ __('messages.update') }}
                    </button>
                </form>

                <strong>{{ __('messages.products_label') }}:</strong>
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