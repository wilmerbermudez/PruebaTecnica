@extends('layouts.app')

@section('title','Carrito de compras')

@section('content')
  <div class="container text-center">
    <div class="page-header">
      <h1><i class="fa fa-shopping-cart"></i>Carrito de compras</h1>
    </div>
    <div class="table-cart">
      @if (count($cart))
        <p>
          <a href="{{route('cart-trash')}}" class="btn btn-danger">
            Vaciar carrito <i class="fa fa-trash"></i>
          </a>
        </p>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Quitar</th>
              </tr>
            </thead>
            <body>
              @foreach ($cart as $item)
                <tr>
                  <td>{{$item->producto}}</td>
                  <td>${{number_format($item->precio,2)}}</td>
                  <td>
                    <input
                      type="number"
                      min="1"
                      max="100"
                      value="{{$item->quantity}}"
                      id="producto_{{$item->id}}"
                    >
                    <a
                      href="#"
                      class="btn btn-warning btn-update-item"
                      data-href="{{route('cart-update', $item->id)}}"
                      data-id="{{$item->id}}"
                    >
                          <i class="fa fa-refresh"></i>
                    </a>
                  </td>
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
                  <td>
                    <a href="{{route('cart-delete', $item->id)}}" class="btn btn-danger">
                      <i class="fa fa-remove"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </body>
          </table><hr>
          <h3>
            <span class="label label-success">
               Total: ${{number_format($total,2)}}
            </span>
          </h3>
        </div>
    @else
      <h3><span class="label label-warning">No hay productos en el carrito</span></h3>
    @endif
    <hr>
    <p>
      <a href="/productos" class="btn btn-primary">
        <i class="fa fa-chevron-circle-left"></i>Seguir comprando
      </a>
      <a href="{{route('order-detail')}}" class="btn btn-primary">
        Detalles del Pedido <i class="fa fa-chevron-circle-right"></i>
      </a>
    </p>
    </div>
  </div>
@endsection