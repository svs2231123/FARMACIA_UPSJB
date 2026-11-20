{{-- Formulario compartido por create.blade.php y edit.blade.php --}}
{{-- En edit existe $customer; en create no, y ?? '' deja el campo vacío --}}
<div class="mb-3">
    <label for="name" class="form-label">Nombre completo</label>
    <input type="text" name="name" id="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $customer->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="dni" class="form-label">DNI</label>
    <input type="text" name="dni" id="dni" maxlength="8"
        class="form-control @error('dni') is-invalid @enderror"
        value="{{ old('dni', $customer->dni ?? '') }}">
    @error('dni')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="phone" class="form-label">Teléfono</label>
    <input type="text" name="phone" id="phone" maxlength="15"
        class="form-control @error('phone') is-invalid @enderror"
        value="{{ old('phone', $customer->phone ?? '') }}">
    @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="age" class="form-label">Edad</label>
    <input type="number" name="age" id="age" min="0" max="255"
        class="form-control @error('age') is-invalid @enderror"
        value="{{ old('age', $customer->age ?? '') }}">
    @error('age')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary text-white">Guardar</button>
<a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancelar</a>
