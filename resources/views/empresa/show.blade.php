@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ __('Detalle empresa') }}</h1>

        <div class="card m-auto" style="width: 18rem;">
            @if (isset($empresa->logotipo))
                <img class="img-thumbnail img-fluid" src="{{ asset('storage/' . $empresa->logotipo) }}" alt="" width="400">
            @endif
            <div class="card-body">
                <p class="card-text"><b>{{ __('Nombre') . ': ' }} </b>{{ $empresa->nombre }}</p>
                <p class="card-text"><b>{{ __('Email') . ': ' }}</b>{{ $empresa->email }}</p>
                <p class="card-text"><b>{{ __('Sitio Web') . ': ' }}</b>{{ $empresa->sitio_web }}</p>
                <a href="{{ route('empresa.index') }}" class="btn btn-primary">{{ __('Regresar') }}</a>
            </div>
        </div>
    </div>
@endsection
