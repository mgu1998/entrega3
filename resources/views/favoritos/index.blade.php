@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">

        @foreach ($favoritos as $favorito)

        <div class="col-6 col-md-4 col-xl-3">
            <div class="card mt-3 p-3">
                <img src="data:image/jpeg;base64,{{ $favorito->producto->archivo->imagen }}" class="card-img-top"
                    alt="..." height="350px" width="400px">

                <div class="card-body px-0  py-3">

                    <h4 class="card-text"><b>{{$favorito->producto->precio }} €</b></h4>
                    <a href="/producto/{{$favorito->producto->id}}">
                        <h4 class="card-title">{{ $favorito->producto->nombre }}</h4>
                    </a>
                    <p class="card-text" style="opacity:0.7">{{ $favorito->producto->descripcion }}</p>
                    <p class="card-text">
                        @if($favorito->producto->estado==0)
                        En venta
                        @elseif($favorito->producto->estado==1)
                        Vendido
                        @elseif($favorito->producto->estado==2)
                        retirado
                        @elseif($favorito->producto->estado==3)
                        Censurado

                        @endif
                    </p>
                </div>

                <a href="/producto/{{$favorito->producto->id}}" class="btn btn-success">Ver mas</a>

            </div>
        </div>


        @endforeach
    </div>
</div>
@endsection