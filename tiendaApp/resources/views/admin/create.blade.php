@extends('shop.base2')
@section('title', 'Argo Create Game')
@section('contenido')
    <h2>Crear Producto</h2>

    <form action="{{ url('admin') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="Nombre" class="form-label">Producto</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" maxlength="255"  required value="{{ old('Nombre') }}">
        </div>
      <div class="mb-3">
            <label for="Precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="Precio" name="Precio" maxlength="255"  required value="{{ old('Precio') }}">
        </div>
        
        <div class="md-form mb-4">
          <label for="imagen" class="form-label">Imagen</label>
          <input type="file" class="form-control" id="imagen" name="imagen">
        </div>
       
       <div class="md-form mb-4">
          <label for="Talla" class="form-label">Talla</label>
              <select class="form-select" id="Talla" name="Talla" required>
                <option value="L">L</option>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="XL">XL</option>
              </select>
        </div>
        
        <button type="submit" class="btn btn-success">Submit</button>
         <a href="{{ url('admin/') }}" class="btn btn-primary">Back</a>
    </form>

@endsection
