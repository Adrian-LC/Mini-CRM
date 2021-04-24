<div class="mb-3">
    <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ isset($empleado->nombre) ? $empleado->nombre : old('nombre') }}">
    @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="apellido" class="form-label">{{ __('Apellido') }}</label>
    <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ isset($empleado->apellido) ? $empleado->apellido : old('apellido') }}">
    @error('apellido')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Empresa') }}</label>
    <div>
        <select class="form-control @error('empresa_id') is-invalid @enderror" name="empresa_id">
            @if (isset($empleado->empresa))
                <option value="{{ $empleado->empresa->id }}">{{ $empleado->empresa->nombre }}</option>
            @else
                <option value="">Seleccione una opción...</option>
            @endif
            
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
            @endforeach
        </select>
        @error('empresa_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="email" class="form-label">{{ __('Email') }}</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ isset($empleado->email) ? $empleado->email : old('email') }}">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="mb-3">
    <label for="telefono" class="form-label">{{ __('Teléfono') }}</label>
    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ isset($empleado->telefono) ? $empleado->telefono : old('telefono') }}">
    @error('telefono')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="d-inline">
    <input type="submit" value="{{ __($accion) }}" class="btn btn-info">
</div>

<div class="d-inline">
    <a href="{{ route('empleado.index') }}" class="btn btn-secondary">{{ __('Regresar') }}</a>
</div>
