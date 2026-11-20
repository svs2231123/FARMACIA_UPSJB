{{-- Formulario compartido por create.blade.php y edit.blade.php --}}
{{-- En edit existe $medicine; en create no, y ?? '' deja el campo vacío --}}
<div class="mb-3">
    <label for="category_id" class="form-label">Categoría</label>
    <select name="category_id" id="category_id"
        class="form-select @error('category_id') is-invalid @enderror">
        <option value="">-- Seleccione --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $medicine->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" name="name" id="name" maxlength="120"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $medicine->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="price" class="form-label">Precio (S/)</label>
    <input type="number" name="price" id="price" min="0" step="0.01"
        class="form-control @error('price') is-invalid @enderror"
        value="{{ old('price', $medicine->price ?? '') }}">
    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" name="stock" id="stock" min="0" step="1"
        class="form-control @error('stock') is-invalid @enderror"
        value="{{ old('stock', $medicine->stock ?? 0) }}">
    @error('stock')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary text-white">Guardar</button>
<a href="{{ route('medicines.index') }}" class="btn btn-secondary">Cancelar</a>
