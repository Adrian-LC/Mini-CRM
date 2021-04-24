<div class="mb-3">
  <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
  <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ isset($empresa->nombre) ? $empresa->nombre : old('nombre') }}">
  @error('nombre')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="mb-3">
  <label for="email" class="form-label">{{ __('Email') }}</label>
  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ isset($empresa->email) ? $empresa->email : old('email') }}">
  @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="mb-3">
  <label class="form-label">{{ __('Logotipo') }}</label>
  <input type="file" class="form-control @error('logotipo') is-invalid @enderror" name="logotipo">
  @error('logotipo')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="mb-3">
  <label for="sitio_web" class="form-label">{{ __('Sitio Web') }}</label>
  <input type="text" class="form-control @error('sitio_web') is-invalid @enderror" id="sitio_web" name="sitio_web" value="{{ isset($empresa->sitio_web) ? $empresa->sitio_web : old('sitio_web') }}">
  @error('sitio_web')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="d-inline">
    <input type="submit" value="{{ __($accion) }}" class="btn btn-info">
</div>

<div class="d-inline">
    <a href="{{ route('empresa.index') }}" class="btn btn-secondary">{{ __('Regresar') }}</a>
</div>
