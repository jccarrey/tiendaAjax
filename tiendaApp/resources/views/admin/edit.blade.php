@extends('shop.base2')

@section('title', 'Edit Producto')

@section('contenido')
<h2>Editar Producto</h2>
    <form action="{{ url('admin/'.$producto->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="Nombre" class="form-label">Producto</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" maxlength="60" required value="{{ old('Nombre', $producto->nombre) }}">
        </div>
       <div class="mb-3">
            <label for="Precio" class="form-label">Precio</label>
            <input type="text" class="form-control" id="Precio" name="Precio" maxlength="60" required value="{{ old('Precio', $producto->precio) }}">
        </div>
        
        <div class="md-form mb-4">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
        </div>
        
        <div class="md-form mb-4">
                        <label for="talla" class="form-label">Talla</label>
                        <select class="form-select" id="talla" name="talla" required>
                            <option value="L" {{ old('Talla', $producto->talla) == 'L' ? 'selected' : '' }}>L</option>
                            <option value="XS" {{ old('Talla', $producto->talla) == 'XS' ? 'selected' : '' }}>XS</option>
                            <option value="S" {{ old('Talla', $producto->talla) == 'S' ? 'selected' : '' }}>S</option>
                            <option value="XL" {{ old('Talla', $producto->talla) == 'XL' ? 'selected' : '' }}>XL</option>
                        </select>
                    </div>
                    
        <button type="submit" class="btn btn-success">Submit</button>
         <a href="{{ url('admin/') }}" class="btn btn-primary">Back</a>

         
      
    
    </form>     
       
    <script>
    const forms = document.querySelectorAll(".formDelete");
    forms.forEach(function(form){
        form.onsubmit = () => {
            return confirm("Seguro?");
        }
    });
    

</script>    
@endsection
