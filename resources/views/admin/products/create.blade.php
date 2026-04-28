@extends('layouts.app')

@section('title', 'Nuevo producto')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Nuevo producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" 
                   class="form-control @error('name') is-invalid @enderror" 
                   id="name" 
                   name="name" 
                   value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      id="description" 
                      name="description" 
                      rows="4">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Precio (€)</label>
            <input type="number" 
                   step="0.01" 
                   min="0"
                   class="form-control @error('price') is-invalid @enderror" 
                   id="price" 
                   name="price" 
                   value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categoría</label>
            <select class="form-select @error('category') is-invalid @enderror" 
                    id="category" 
                    name="category">
                <option value="">-- Selecciona --</option>
                <option value="Pokemon" {{ old('category') == 'Pokemon' ? 'selected' : '' }}>Pokémon</option>
                <option value="Yugioh" {{ old('category') == 'Yugioh' ? 'selected' : '' }}>Yu-Gi-Oh</option>
            </select>
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <input type="text" 
                   class="form-control @error('image') is-invalid @enderror" 
                   id="image" 
                   name="image" 
                   value="{{ old('image') }}"
                   placeholder="charizard.jpg">
            <small class="text-muted">Nombre del archivo en public/img/</small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection