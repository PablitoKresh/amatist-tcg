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

        <div class="row">
            <div class="col-md-6 mb-3">
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

            <div class="col-md-6 mb-3">
                <label for="stock" class="form-label">
                    {{ __('messages.stock') }}
                </label>
                <input type="number"
                       min="0"
                       class="form-control @error('stock') is-invalid @enderror"
                       id="stock"
                       name="stock"
                       value="{{ old('stock', 0) }}">
                @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="categories" class="form-label">
                {{ __('messages.categories') }}
            </label>
            <select multiple
                    class="form-select @error('categories') is-invalid @enderror"
                    id="categories"
                    name="categories[]"
                    size="5">
                @forelse($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ collect(old('categories'))->contains($categoria->id) ? 'selected' : '' }}>
                        {{ $categoria->name }}
                    </option>
                @empty
                    <option disabled>{{ __('messages.no_categories_available') }}</option>
                @endforelse
            </select>
            <small class="text-muted">{{ __('messages.multiselect_help') }}</small>
            @error('categories')
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
