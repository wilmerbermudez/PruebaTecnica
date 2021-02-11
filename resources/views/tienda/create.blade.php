@extends('layouts.app')

@section('title', 'Creacion Productos')

@section('content')
    <div class="container">
    <form class="form-group" action="/productos" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="">Producto</label>
        <input type="text"  name="producto" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Precio</label>
        <input type="integer"  name="precio" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Unidades</label>
        <input type="text"  name="unidades" class="form-control">
      </div>
      <button type="submit"class="btn btn-primary">Registrar</button>
    </form>
  </div>
@endsection
