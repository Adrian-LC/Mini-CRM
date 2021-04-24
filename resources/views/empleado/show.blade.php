@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ __('Detalle empleado') }}</h1>

        <div class="card m-auto" style="width: 18rem;">
            <div class="card-body">
                <p class="card-text"><b>{{ __('Nombre') . ': ' }} </b>{{ $empleado->nombre }}</p>
                <p class="card-text"><b>{{ __('Apellido') . ': ' }} </b>{{ $empleado->apellido }}</p>
                <p class="card-text"><b>{{ __('Empresa') . ': ' }} </b>{{ $empleado->empresa->nombre }}</p>
                <p class="card-text"><b>{{ __('Email') . ': ' }} </b>{{ $empleado->email }}</p>
                <p class="card-text"><b>{{ __('Teléfono') . ': ' }} </b>{{ $empleado->telefono }}</p>
                <a href="{{ route('empleado.index') }}" class="btn btn-primary">{{ __('Regresar') }}</a>
            </div>
        </div>
    </div>
@endsection
