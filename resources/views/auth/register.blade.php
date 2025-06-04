@extends('layouts.app')
@section('title', 'Registrate')
@section('content')
<section class="breadcrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-contain">
                    <h2 class="mb-2">Registrate</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Registrate</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="log-in-section section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">

            <!-- Imagen lateral -->
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="{{ asset('assets/images/inner-page/sign-up.png') }}" class="img-fluid" alt="Registro Art-Temoaya">
                </div>
            </div>

            <!-- Formulario de registro -->
            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="log-in-box">
                    <div class="log-in-title text-center">
                        <h3>Bienvenido a Art-Temoaya</h3>
                        <h4>Crea una nueva cuenta</h4>
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
                        <form method="POST" action="{{ route('register') }}" class="row g-4">
                            @csrf

                            <!-- Nombre completo -->
                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre completo" value="{{ old('name') }}" required autofocus>
                                    <label for="name">Nombre completo</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Teléfono" value="{{ old('phone') }}" required>
                                    <label for="phone">Teléfono</label>

                                    @error('phone')
                                        <samp class="invalid-feedback d-block" role="alert">
                                              <strong>{{ $message }}</strong>

                                        </samp>

                                    @enderror
                                </div>
                            </div>









                            <!-- Correo electrónico -->
                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" value="{{ old('email') }}" required>
                                    <label for="email">Correo electrónico</label>
                                </div>
                            </div>

                            <!-- Contraseña -->
                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
                                    <label for="password">Contraseña</label>
                                </div>
                            </div>

                            <!-- Confirmar contraseña -->
                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirmar contraseña" required>
                                    <label for="password_confirmation">Confirmar contraseña</label>
                                </div>
                            </div>


                            <!-- Aceptar términos -->
                            <div class="col-12">
                                <div class="forgot-box">
                                    <div class="form-check ps-0 m-0 remember-box">
                                        <input class="checkbox_animated check-box" type="checkbox" id="terms" required>
                                        <label class="form-check-label small" for="terms">
                                            Acepto los <span class="fw-bold">Términos</span> y la <span class="fw-bold">Política de Privacidad</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón de registro -->
                            <div class="col-12">
                                <button class="btn btn-animation w-100" type="submit">Crear cuenta</button>
                            </div>
                        </form>
                    </div>

                    <!-- Ya tienes cuenta -->
                    <div class="sign-up-box text-center mt-4">
                        <h4>¿Ya tienes una cuenta?</h4>
                        <a href="{{ route('login') }}" class="theme-color">Iniciar sesión</a>
                    </div>
                </div>
    </div>
</div>
</section>

@endsection


