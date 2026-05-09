@extends('layouts.app')

@section('title', __('messages.new_product'))

@section('content')
<div class="container py-4">
    <h1 class="mb-4">{{ __('messages.new_product') }}</h1>

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
            <label for="name" class="form-label">
                {{ __('messages.name') }}
            </label>
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
            <label for="description" class="form-label">
                {{ __('messages.description') }}
            </label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      id="description" 
                      name="description" 
                      rows="4">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">
                {{ __('messages.price') }} (€)
            </label>
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
            <label for="category" class="form-label">
                {{ __('messages.category') }}
            </label>
            <select class="form-select @error('category') is-invalid @enderror" 
                    id="category" 
                    name="category">
                <option value="">
                    -- {{ __('messages.select') }} --
                </option>
                <option value="Pokemon" {{ old('category') == 'Pokemon' ? 'selected' : '' }}>Pokémon</option>
                <option value="Yugioh" {{ old('category') == 'Yugioh' ? 'selected' : '' }}>Yu-Gi-Oh</option>
            </select>
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">
                {{ __('messages.image') }}
            </label>
            <input type="text" 
                   class="form-control @error('image') is-invalid @enderror" 
                   id="image" 
                   name="image" 
                   value="{{ old('image') }}"
                   placeholder="charizard.jpg">
            <small class="text-muted">
                {{ __('messages.image_help') }}
            </small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">{{ __('messages.cancel') }}</a>
        </div>
    </form>
</div>
@endsection