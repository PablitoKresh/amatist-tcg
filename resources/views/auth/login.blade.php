@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ __('messages.login') }}</h2>

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