@extends('layouts.app')

@section('title','Detalles Del Pedido')

@section('content')
  <div class="container text-center">
    <div class="page-header">
      <h1><i class="fa fa-shopping-cart"></i>Detalle del pedido</h1>
    </div>
    <div class="page">
      <div class="table-responsive">
        <h3>Datos del Usuario</h3>
        <table class="table table-striped table-hover table-bordered">
          <tr><td>Nombre:</td><td>{{Auth::user()->name}}</td></tr>
          <tr><td>Correo:</td><td>{{Auth::user()->email}}</td></tr>
        </table>
      </div>
      <div class="table-responsive">
        <h3>Datos del Pedido</h3>
        <table class="table table-striped table-hover table-bordered">
          <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>
          @foreach ($cart as $item)
            <tr>
              <td>{{$item->producto}}</td>
              <td>${{number_format($item->precio,2)}}</td>
              <td>{{$item->quantity}}</td>
              <?php
                    if ($item->quantity >= 5) 
                      {
                           $descuento = ($item->precio * $item->quantity) *0.1;
                           $total = ($item->precio * $item->quantity) - $descuento;
                        }
                        else {
                            $total =$item->precio * $item->quantity;
                        }
                ?>
                  <td>${{number_format($total,2)}}</td>
            </tr>
          @endforeach
        </table><hr>
        <h3>
          <span class="label label-success">
            Total: ${{number_format($total,2)}}
          </span>
        </h3><hr>
        <p>
          <a href="{{route('cart-show')}}" class="btn btn-primary">
            <i class="fa fa-chevron-circle-left"></i>Regresar
          </a>
          <a href="#" class="btn btn-danger">
            Pagar <i class="fa fa-money" style="font-size:25px"></i>
          </a>
        </p>
    </div>
  </div>
@endsection
