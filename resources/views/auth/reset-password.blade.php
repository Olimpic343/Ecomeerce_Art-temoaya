
@extends('layouts.app')
@section('title', 'Iniciar Sesion')
@section('content')
<section class="breadcrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-contain">
                    <h2 class="mb-2">Cambiar Contraseña</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Cambiar Contraseña</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="log-in-section section-b-space forgot-section">
    <div class="container-fluid-lg w-100">
        <div class="row">

            <!-- Imagen ilustrativa -->
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="{{ asset('assets/images/inner-page/forgot.png') }}" class="img-fluid" alt="Restablecer contraseña - Art-Temoaya">
                </div>
            </div>

            <!-- Formulario de restablecimiento -->
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="log-in-box">

                        <div class="log-in-title text-center">
                            <h3>Restablece tu contraseña</h3>
                            <h4>Ingresa tu nueva contraseña para acceder nuevamente</h4>
                        </div>

                        <!-- Mostrar errores -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="input-box">
                            <form method="POST" action="{{ route('password.update') }}" class="row g-4">
                                @csrf

                                <!-- Token oculto obligatorio -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <!-- Email -->
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" value="{{ old('email', $request->email) }}" required autofocus>
                                        <label for="email">Correo electrónico</label>
                                    </div>
                                </div>

                                <!-- Nueva contraseña -->
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Nueva contraseña" required>
                                        <label for="password">Nueva contraseña</label>
                                    </div>
                                </div>

                                <!-- Confirmación de contraseña -->
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmar contraseña" required>
                                        <label for="password_confirmation">Confirmar contraseña</label>
                                    </div>
                                </div>

                                <!-- Botón -->
                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="submit">
                                        Restablecer contraseña
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
</section>

@endsection

