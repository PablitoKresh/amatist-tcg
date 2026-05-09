@extends('layouts.app')

@section('title', __('messages.product_management'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ __('messages.product_management') }}</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">{{ __('messages.add_product') }}</a>
    </div>

    <table class="table table-striped table-hover align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>{{ __('messages.image') }}</th>
            <th>{{ __('messages.name') }}</th>
            <th>{{ __('messages.category') }}</th>
            <th>{{ __('messages.price') }}</th>
            <th class="text-end">{{ __('messages.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>
                    @if ($producto->image)
                        <img src="{{ asset('img/' . $producto->image) }}" alt="{{ $producto->name }}" class="img-thumbnail" style="max-height: 100px;">
                    @else
                        <span class="text-muted">{{ __('messages.no_image') }}</span>
                    @endif
                </td>
                <td>{{ $producto->name }}</td>
                <td>{{ $producto->category }}</td>
                <td>${{ number_format($producto->price, 2) }} €</td>
                <td class="text-end">
                    <a href="{{ route('admin.products.edit', $producto->id) }}" class="btn btn-sm btn-outline-primary">{{ __('messages.edit') }}</a>
                    <form action="{{ route('admin.products.destroy', $producto->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ __('messages.confirm_delete_product') }}')">{{ __('messages.delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection