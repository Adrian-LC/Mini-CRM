@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ __('Editar empleado') }}</h1>

        <form action="{{ route('empleado.update', ['empleado' => $empleado->id]) }}" method="post">
            @csrf
            {{ method_field('PUT') }}
            @include('empleado.form', ['accion' => 'Editar'])
        </form>
    </div>
@endsection
