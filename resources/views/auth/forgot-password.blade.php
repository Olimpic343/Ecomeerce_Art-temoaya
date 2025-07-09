{{-- resources/views/auth/forgot-password.blade.php --}}

@extends('layouts.app')

@section('title', 'Olvidé mi contraseña')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4">¿Olvidaste tu contraseña?</h2>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror"
                required
                autofocus>
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enviar enlace de restablecimiento</button>
    </form>
</div>
@endsection
