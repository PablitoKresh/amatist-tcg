@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ __('messages.login') }}</h2>

    @if (config('app.demo'))
        <div class="alert alert-info">
            <strong>Demo:</strong> puedes entrar con estas cuentas de prueba.
            Los datos se reinician cada vez que se reinicia el servidor.
            <ul class="mb-0 mt-2">
                <li>Admin: <code>admin@amatist.test</code> / <code>admin123</code></li>
                <li>Cliente: <code>pepe@pepe.com</code> / <code>user123</code></li>
            </ul>
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="{{ __('messages.email') }}" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="{{ __('messages.password') }}" required>
        </div>

        <button class="btn btn-primary">{{ __('messages.enter') }}</button>
    </form>
</div>
@endsection