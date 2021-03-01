@extends('layouts.app')

@section('content')


<div class="container">
    @if (!Auth::guest())
    @if(is_null(Auth::user()->email_verified_at))
    <div class="alert alert-danger" role="alert">
        Correo aun sin verificar.
    </div>
    @endif
    @endif

    <div class="row">

        @foreach($productos as $producto)

        <div class="col-6 col-md-4 col-xl-3">
            <div class="card mt-3 p-3">
                <img src="data:image/jpeg;base64,{{ $producto->archivo->imagen }}" class="card-img-top" alt="..."
                    height="350px" width="400px">

                <div class="card-body px-0  py-3">

                    <h4 class="card-text"><b>{{ $producto->precio }} €</b></h4>
                    <a href="/producto/{{$producto->id}}">
                        <h4 class="card-title">{{ $producto->nombre }}</h4>
                    </a>
                    <p class="card-text" style="opacity:0.7">{{ $producto->descripcion }}</p>
                    <p class="card-text">
                        @if($producto->estado==0)
                        En venta
                        @elseif($producto->estado==1)
                        Vendido
                        @elseif($producto->estado==2)
                        retirado
                        @elseif($producto->estado==3)
                        Censurado

                        @endif
                    </p>
                </div>

                <a href="/producto/{{$producto->id}}" class="btn btn-success">Ver mas</a>

            </div>
        </div>

        @endforeach
    </div>
</div>




<!--
op -> store, update, destroy
r -> negativo, 0, positivo (acierto)
id -> id del elemento afectado
-->

@if(session()->has('op'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
        </div>
    </div>
</div>
@endif

{{--
@if(Session::get('op') !== null)
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            producto created successfully 2: {{ Session::get('id') }}
</div>
</div>
</div>
@endif
--}}
</div>
@endsection