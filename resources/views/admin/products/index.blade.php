@extends('layouts.app')

@section('title', 'Gestión de productos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestión de productos</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Agregar nuevo producto</a>
    </div>

    <table class="table table-striped table-hover align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th class="text-end">Acciones</th>
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
                        <span class="text-muted">Sin imagen</span>
                    @endif
                </td>
                <td>{{ $producto->name }}</td>
                <td>{{ $producto->category }}</td>
                <td>${{ number_format($producto->price, 2) }} €</td>
                <td class="text-end">
                    <a href="{{ route('admin.products.edit', $producto->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                    <form action="{{ route('admin.products.destroy', $producto->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection