{{-- Formulario compartido por create.blade.php y edit.blade.php --}}
{{-- En edit existe $category; en create no, y ?? '' deja el campo vacío --}}
<div class="mb-3">
<label for="name" class="form-label">Nombre de la categoría</label>
<input type="text" name="name" id="name"
class="form-control @error('name') is-invalid @enderror"
value="{{ old('name', $category->name ?? '') }}">
{{-- Mensaje de error del campo name --}}
@error('name')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label for="description" class="form-label">Descripción</label>
<textarea name="description" id="description" rows="3"
class="form-control @error('description') is-invalid @enderror"
>{{ old('description', $category->description ?? '') }}</textarea>
@error('description')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<button type="submit" class="btn btn-primary text-white">Guardar</button>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>