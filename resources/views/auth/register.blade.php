@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ __('messages.register') }}</h2>

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
            <input type="text" name="name" class="form-control" placeholder="{{ __('messages.name') }}" required>
        </div>

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="{{ __('messages.email') }}" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="{{ __('messages.password') }}" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('messages.confirm_password') }}" required>
        </div>

        <button class="btn btn-success">{{ __('messages.register') }}</button>
    </form>
</div>
@endsection