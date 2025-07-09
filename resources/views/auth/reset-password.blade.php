{{-- resources/views/auth/reset-password.blade.php --}}

@extends('layouts.app')

@section('title', 'Restablecer contraseña')

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4">Restablece tu contraseña</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        {{-- O @method('POST') si definiste la ruta con POST en lugar de PUT --}}

        {{-- 1) Token oculto (viene en la URL) --}}
        <input type="hidden" name="token" value="{{ $token }}">

        {{-- 2) Email (la vista recibió $email desde el controlador) --}}
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email', $email) }}"
                class="form-control @error('email') is-invalid @enderror"
                required
                autofocus>
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        {{-- 3) Nueva contraseña --}}
        <div class="mb-3">
            <label for="password" class="form-label">Nueva contraseña</label>
            <input
                id="password"
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                required>
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        {{-- 4) Confirmación --}}
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                class="form-control"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Restablecer contraseña</button>
    </form>
</div>
@endsection
