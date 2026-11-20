{{-- Formulario compartido por create.blade.php y edit.blade.php --}}
{{-- En edit existe $rol; en create no, y ?? '' deja el campo vacío --}}
<div class="mb-3">
<label for="nombre" class="form-label">Nombre del rol</label>
<input type="text" name="nombre" id="nombre"
class="form-control @error('nombre') is-invalid @enderror"
value="{{ old('nombre', $rol->nombre ?? '') }}">
@error('nombre')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label for="descripcion" class="form-label">Descripción</label>
<textarea name="descripcion" id="descripcion" rows="3"
class="form-control @error('descripcion') is-invalid @enderror"
>{{ old('descripcion', $rol->descripcion ?? '') }}</textarea>
@error('descripcion')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<button type="submit" class="btn btn-primary text-white">Guardar</button>
<a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
