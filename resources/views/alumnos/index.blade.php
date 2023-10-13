@extends('layouts/template')

@section('title', 'Alumnos')

@section('contenido')
    <nav class="navbar bg-body-tertiary pt-0">
        @if (auth()->check())
            <div class="container-fluid" style="background-color: blue">
                <p class="navbar-brand" style="color: white">UPEU - JULIACA</a>
                <div>
                    <a class="user" href="{{ route('register.index') }}">Registrar Nuevo Usuario</a>
                    <style>
                        /* Estilo base para el enlace */
                        .user {
                            color: blue;
                            text-decoration: none;
                            background: white;
                            padding: 10px;
                            border-radius: 5px;
                        }

                        /* Estilo para el enlace cuando el cursor está sobre él (hover) */
                        .user:hover {
                            color: white;
                            background: blue;
                            border: 2px solid white;
                        }
                    </style>
                </div>
                <div>
                    <a
                        style="color: white; border: 2px solid white; padding: 10px;border-radius: 5px;">{{ auth()->user()->name }}</a>
                    <a href="{{ route('login.destroy') }}" class="btn btn-danger">Cerrar Sesión</a>
                </div>
            </div>
        @else
            <div class="container-fluid" style="background-color: blue;">
                <p class="navbar-brand" style="color: white">UPEU - JULIACA</a>
                <div>
                    <a class="sesion" href="{{ route('login.index') }}">Iniciar Sesión</a>
                    <style>
                        /* Estilo base para el enlace */
                        .sesion {
                            color: blue;
                            text-decoration: none;
                            background: white;
                            padding: 8px;
                            border-radius: 5px;
                        }

                        /* Estilo para el enlace cuando el cursor está sobre él (hover) */
                        .sesion:hover {
                            color: white;
                            background: blue;
                            border: 2px solid white;
                        }
                    </style>
                </div>
            </div>
        @endif

    </nav>
    <main>
        <div class="container py-4">
            <h2>Listado de alumnos de la EP Ingeniería de Sistemas <img src="{{ asset('images/logo-sistemas.png') }}"
                    alt="Logo" style="max-width: 15%;"></h2>

            @if (auth()->check())
                <a href="{{ url('alumnos/create') }}" class="btn btn-primary btn-sm">Nuevo Registro</a>
            @endif

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Fecha Nacimiento</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Ciclo</th>
                        @if (auth()->check())
                            <th></th>
                            <th></th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->id }}</td>
                            <td>{{ $alumno->codigo }}</td>
                            <td>{{ $alumno->nombre }}</td>
                            <td>{{ $alumno->fecha_nacimiento }}</td>
                            <td>{{ $alumno->telefono }}</td>
                            <td>{{ $alumno->email }}</td>
                            <td>{{ $alumno->ciclo->nombre }}</td>
                            @if (auth()->check())
                                <td><a href="{{ url('alumnos/' . $alumno->id . '/edit') }}"
                                        class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ url('alumnos/' . $alumno->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </main>
