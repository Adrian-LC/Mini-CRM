@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ __('Crear nueva empresa') }}</h1>

        <form action="{{ route('empresa.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('empresa.form', ['accion' => 'Crear'])
        </form>
    </div>
@endsection
