@extends('layouts.app')
@section('title', 'Iniciar Sesion')
@section('content')
        <section class="breadcrumb-section pt-0">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-contain">
                            <h2 class="mb-2">Iniciar Sesión</h2>
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="fa-solid fa-house"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">Iniciar Sesión</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="log-in-section background-image-2 section-b-space">
            <div class="container-fluid-lg w-100">
                <div class="row">
                    <!-- Imagen lateral (solo en pantallas grandes) -->
                    <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                        <div class="image-contain">
                            <img src="{{ asset('assets/images/inner-page/log-in.png') }}" class="img-fluid" alt="Inicia sesión en Art-Temoaya">
                        </div>
                    </div>

                    <!-- Formulario de inicio de sesión -->
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                        <div class="log-in-box">
                            <div class="log-in-title text-center">
                                <h3>Bienvenido a ArtTemoaya</h3>
                                <h4>Inicia sesión en tu cuenta</h4>
                            </div>

                            <!-- Mostrar errores de validación -->
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
                                <form method="POST" action="{{ route('login') }}" class="row g-4">
                                    @csrf

                                    <!-- Email -->
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating log-in-form">
                                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autofocus>
                                            <label for="email">Correo electrónico</label>
                                        </div>
                                    </div>

                                    <!-- Contraseña -->
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating log-in-form">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
                                            <label for="password">Contraseña</label>
                                        </div>
                                    </div>

                                    <!-- Recordarme y contraseña olvidada -->
                                    <div class="col-12">
                                        <div class="forgot-box d-flex justify-content-between align-items-center">
                                            <div class="form-check ps-0 m-0 remember-box">
                                                <input class="checkbox_animated check-box" type="checkbox" name="remember" id="remember">
                                                <label class="form-check-label" for="remember">Recordarme</label>
                                            </div>
                                            <a href="{{ route('password.request') }}" class="forgot-password small text-muted">¿Olvidaste tu contraseña?</a>
                                        </div>
                                    </div>

                                    <!-- Botón iniciar sesión -->
                                    <div class="col-12">
                                        <button class="btn btn-animation w-100 justify-content-center" type="submit">
                                            Iniciar sesión
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Registro -->
                            <div class="sign-up-box text-center mt-4">
                                <h4>¿No tienes una cuenta?</h4>
                                <a href="{{ route('register') }}" class="theme-color">Crear una cuenta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection


