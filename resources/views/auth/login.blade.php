@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Iniciar sesión</h2>

    <form method="POST" action="/login">
        @csrf

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        </div>

        <button class="btn btn-primary">Entrar</button>
    </form>
</div>
@endsection