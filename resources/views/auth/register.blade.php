@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registro</h2>

    @if ($errors->any())
    <div style="background:red; color:white; padding:10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="/register">
        @csrf

        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Nombre" required>
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
        </div>

        <button class="btn btn-success">Registrarse</button>
    </form>
</div>
@endsection