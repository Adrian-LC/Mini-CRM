@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ __(Session::get('mensaje')) }}
                <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h1 class="text-center">{{ __('Lista de Empleados') }}</h1>
        
        <a href="{{ route('empleado.create') }}" class="btn btn-success mb-3">{{ __('Crear nuevo empleado') }}</a>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">{{ __('#') }}</th>
            <th scope="col">{{ __('Nombre y Apellido') }}</th>
            <th scope="col">{{ __('Empresa') }}</th>
            <th scope="col">{{ __('Email') }}</th>
            <th scope="col">{{ __('Teléfono') }}</th>
            <th scope="col">{{ __('Acciones') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
                <tr>
                <th scope="row">{{ $empleado->id }}</th>
                <td><a href="{{ route('empleado.show', ['empleado' => $empleado->id]) }}">{{ $empleado->nombre . ' ' . $empleado->apellido }}</a></td>
                <td>{{ $empleado->empresa->nombre }}</td>
                <td>{{ $empleado->email }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>
                    <a href="{{ route('empleado.edit', ['empleado' => $empleado->id]) }}" class="btn btn-info">{{ __('Editar') }}</a>

                    <form action="{{ route('empleado.destroy', ['empleado' => $empleado->id]) }}" method="post" class="d-inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" value="{{ __('Eliminar') }}" onclick="return confirm('¿Eliminar empleado?')" class="btn btn-danger">
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        {{ $empleados->links() }}
    </div>
@endsection
