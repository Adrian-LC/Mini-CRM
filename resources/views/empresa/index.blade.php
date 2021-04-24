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
        @elseif (Session::has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ __(Session::get('error')) }}
                <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h1 class="text-center">{{ __('Lista de Empresas') }}</h1>
        
        <a href="{{ route('empresa.create') }}" class="btn btn-success mb-3">{{ __('Crear nueva empresa') }}</a>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">{{ __('#') }}</th>
            <th scope="col">{{ __('Nombre') }}</th>
            <th scope="col">{{ __('Email') }}</th>
            <th scope="col">{{ __('Logotipo') }}</th>
            <th scope="col">{{ __('Sitio Web') }}</th>
            <th scope="col">{{ __('Acciones') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empresas as $empresa)
                <tr>
                <th scope="row">{{ $empresa->id }}</th>
                <td><a href="{{ route('empresa.show', ['empresa' => $empresa->id]) }}">{{ $empresa->nombre }}</a></td>
                <td>{{ $empresa->email }}</td>
                <td>
                    @if (isset($empresa->logotipo))
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage/' . $empresa->logotipo) }}" alt="" width="40">
                    @endif
                </td>
                <td>{{ $empresa->sitio_web }}</td>
                <td>
                    <a href="{{ route('empresa.edit', ['empresa' => $empresa->id]) }}" class="btn btn-info">{{ __('Editar') }}</a>

                    <form action="{{ route('empresa.destroy', ['empresa' => $empresa->id]) }}" method="post" class="d-inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" value="{{ __('Eliminar') }}" onclick="return confirm('¿Eliminar empresa?')" class="btn btn-danger">                        
                    </form>    
                </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        {{ $empresas->links() }}
    </div>
@endsection
