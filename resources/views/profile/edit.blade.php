@extends('layouts.app')

@section('title', 'Mi Perfil - Amatist TCG')

@push('styles')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <style>
        .profile-card {
            background: rgba(15, 15, 15, 0.8);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(168, 85, 247, 0.3);
            border-radius: 25px;
            padding: 3rem;
            color: white;
        }
        .form-control-amatist {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white !important;
            border-radius: 12px;
        }
        .form-control-amatist:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #a855f7;
            box-shadow: 0 0 15px rgba(168, 85, 247, 0.2);
        }
        .avatar-preview {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 3px solid #a855f7;
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.4);
        }
    </style>
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-card shadow-lg">
                <h2 class="hero-title text-center mb-5">Mi <span class="text-accent">Perfil</span></h2>

                @if(session('success'))
                    <div class="alert alert-success bg-success text-white border-0">{{ session('success') }}</div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <img src="{{ $user->avatar ? asset('img/avatars/'.$user->avatar) : asset('img/default-avatar.png') }}" 
                                 class="rounded-circle avatar-preview mb-3" id="preview">
                            <label class="btn btn-outline-light btn-sm w-100">
                                Cambiar foto
                                <input type="file" name="avatar" hidden onchange="previewImage(event)">
                            </label>
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label opacity-75">Nombre de Usuario</label>
                                <input type="text" name="name" class="form-control form-control-amatist" value="{{ old('name', $user->name) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label opacity-75">Tu TCG Favorito</label>
                                <select name="favorite_tcg" class="form-select form-control-amatist">
                                    <option value="Magic" {{ $user->favorite_tcg == 'Magic' ? 'selected' : '' }}>Magic: The Gathering</option>
                                    <option value="Pokemon" {{ $user->favorite_tcg == 'Pokemon' ? 'selected' : '' }}>Pokémon TCG</option>
                                    <option value="YuGiOh" {{ $user->favorite_tcg == 'YuGiOh' ? 'selected' : '' }}>Yu-Gi-Oh!</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label opacity-75">Biografía / Lema de duelo</label>
                                <textarea name="bio" class="form-control form-control-amatist" rows="3">{{ old('bio', $user->bio) }}</textarea>
                            </div>

                            <button type="submit" class="btn-glass w-100 py-3">Actualizar Perfil</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection