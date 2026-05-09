@extends('layouts.app')

@section('title', config('app.name'))

@section('content')
    <section class="text-center py-5">
        <h1 class="display-4 mb-3">
            Amatist <span class="text-primary">TCG</span>
        </h1>
        <p class="lead text-secondary">
            {{ __('messages.slogan') }}
        </p>
        <p class="mt-4">
            <a href="{{ route('catalogo') }}" class="btn btn-primary btn-lg me-2">{{ __('messages.view_catalog') }}</a>
            <a href="#" class="btn btn-outline-primary btn-lg">{{ __('messages.register') }}</a>
        </p>
    </section>

    <section class="row row-cols-1 row-cols-md-3 g-4 mt-5">
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ __('messages.magic_title') }}
                    </h5>
                    <p class="card-text text-muted">
                        {{ __('messages.magic_desc') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Pokémon TCG</h5>
                    <p class="card-text text-muted">
                        {{ __('messages.pokemon_desc') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ __('messages.yugioh_title') }}
                    </h5>
                    <p class="card-text text-muted">
                        {{ __('messages.yugioh_desc') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection