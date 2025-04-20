@extends('layouts.app')
@section('title', 'Iniciar Sesion')
@section('content')
<section class="breadcrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-contain">
                    <h2 class="mb-2">Olvidaste tu contraseña</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Olvisaste tu contraseña</li>
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
                    <img src="{{ asset('assets/images/inner-page/forgot.png') }}" class="img-fluid" alt="Recuperar contraseña - Art-Temoaya">
                </div>
            </div>

            <!-- Formulario -->
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="log-in-box">

                        <div class="log-in-title text-center">
                            <h3>Bienvenido a Art-Temoaya</h3>
                            <h4>Recupera tu contraseña</h4>
                        </div>

                        <!-- Mensaje de estado si se envió el correo -->
                        @if (session('status'))
                            <div class="alert alert-success text-center">
                                {{ session('status') }}
                            </div>
                        @endif

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
                            <form method="POST" action="{{ route('password.email') }}" class="row g-4">
                                @csrf

                                <!-- Campo email -->
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" value="{{ old('email') }}" required autofocus>
                                        <label for="email">Correo electrónico</label>
                                    </div>
                                </div>

                                <!-- Botón enviar -->
                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="submit">
                                        Enviar enlace de recuperación
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
