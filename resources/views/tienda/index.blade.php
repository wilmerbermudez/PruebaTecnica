@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <div class="row">
        @foreach ($productos as $producto)
            <div class="col-sm">
                <div class="card" style="width: 18rem">
                    <div class="card-body">
                        <h1 class="card-title">{{$producto->producto}}</h1>
                        <h5 class="card-title">{{$producto->precio}}</h5>
                        <h5 class="card-title">{{$producto->unidades}}</h5>
                        <a href="#" class="btn btn-primary">Añadir</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection