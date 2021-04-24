@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ __('Crear nuevo empleado') }}</h1>

        <form action="{{ route('empleado.store') }}" method="post">
            @csrf
            @include('empleado.form', ['accion' => 'Crear'])
        </form>
    </div>
@endsection
