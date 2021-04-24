@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ __('Editar empresa') }}</h1>

        <form action="{{ route('empresa.update', ['empresa' => $empresa->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            @include('empresa.form', ['accion' => 'Editar'])
        </form>
    </div>
@endsection
