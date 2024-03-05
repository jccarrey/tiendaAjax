@extends('shop.base2') 
@section('title', 'Argo Create Producto')
@section('contenido')
<div class="card">
    <div class="card-header">
        <strong class="card-title">Custom Table</strong>
    </div>
    <div class="table-stats order-table ov-h">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#        <a
                            href="{{ route('sort', ['column' => 'id', 'order' => ($column == 'id' && $order == 'asc') ? 'desc' : 'asc']) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-bar-expand" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M3.646 10.146a.5.5 0 0 1 .708 0L8 13.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708m0-4.292a.5.5 0 0 0 .708 0L8 2.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8"/>
                    </svg></a></th>
                                        <th scope="col">Productos<a
                                                href="{{ route('sort', ['column' => 'nombre', 'order' => ($column == 'nombre' && $order == 'asc') ? 'desc' : 'asc']) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-bar-expand" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M3.646 10.146a.5.5 0 0 1 .708 0L8 13.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708m0-4.292a.5.5 0 0 0 .708 0L8 2.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8"/>
                    </svg></a></th>
                                        <th scope="col">Precio
                                            <a
                                                href="{{ route('sort', ['column' => 'precio', 'order' => ($column == 'precio' && $order == 'asc') ? 'desc' : 'asc']) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-bar-expand" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M3.646 10.146a.5.5 0 0 1 .708 0L8 13.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708m0-4.292a.5.5 0 0 0 .708 0L8 2.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8"/>
                    </svg></a>
                                        </th>
                                        <th scope="col">Imagen</th>

                                        <th scope="col">Talla
                                               <a
                                                href="{{ route('sort', ['column' => 'talla', 'order' => ($column == 'talla' && $order == 'asc') ? 'desc' : 'asc']) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-bar-expand" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M3.646 10.146a.5.5 0 0 1 .708 0L8 13.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 0-.708m0-4.292a.5.5 0 0 0 .708 0L8 2.207l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 0 0 0 .708M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8"/>
                    </svg></a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->precio }}€</td>
                    <td><img src="{{ asset('images/' . $producto->imagen) }}" alt="Producto" style="max-width: 100px;">
                    </td>
                    <td>{{ $producto->talla }}</td>
                    <td>
                        <a
                            href="{{ url('admin/' . $producto->id . '/edit')}}"
                            class="btn btn-success"
                            ><i class="fa fa-magic"></i>Edit</a
                        >
                        <form
                            class="formDelete"
                            action="{{ url('admin/' . $producto->id) }}"
                            method="post"
                            style="display: inline-block"
                        >
                            @csrf @method('delete')
                            <button class="btn-danger btn" type="submit">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn-primary btn" href="{{ url('admin/create') }}"
            ><i class="fa fa-plus"></i>Link to create</a
        >
        <a href="{{ url('login/') }}" class="btn btn-primary">Back</a>
    </div>
</div>
<script>
    const forms = document.querySelectorAll(".formDelete");
    forms.forEach(function(form){
        form.onsubmit = () => {
            return confirm("Seguro?");
        }
    });
</script>

@endsection
