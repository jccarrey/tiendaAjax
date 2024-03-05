@extends('shop.base2')
@section('title', 'Argo Create Game')
@section('contenido')
    <h2>Login</h2>

 <form action="{{ url('login') }}" method="post">
         @csrf

        <div class="mb-3">
            <label for="User" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="User" name="User" maxlength="255"  required value="{{ old('User') }}">
        </div>
  <div class="mb-3">
            <label for="Password" class="form-label">Contraseña</label>
            <input type="text" class="form-control" id="Password" name="Password" maxlength="255"  required value="{{ old('Password') }}">
        </div>
   
        <button type="submit" class="btn btn-success">Submit</button>
         <a href="{{ url('shop/') }}" class="btn btn-primary">Shop</a>
    </form>
    @if(session('verificado'))
        <form action="{{ url('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Logout</button>
                     <a href="{{ url('admin/') }}" class="btn btn-primary">Admin</a>

        </form>
    @endif
@endsection
