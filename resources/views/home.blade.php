@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <body>
        <nav class="navbar bg-body-tertiary pt-0">
            <div class="container-fluid" style="background-color: blue">
                <p class="navbar-brand" style="color: white">UPEU - JULIACA</a>
                <div>
                    <a href="{{ route('login.index') }}" style="color: white">Iniciar Sesión</a>
                    <a href="{{ route('register.index') }}" style="color: white">Registrarse</a>
                </div>
            </div>
        </nav>
    </body>
@endsection
