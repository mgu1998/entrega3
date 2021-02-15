@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    <a href="{{ url('/') }}" class="btn btn-primary">Productos</a>
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <h2>Error ...</h2>
            </div>
        </div>
    </div>

    @endif

    <div class="row  py-4 px-3">
        <div class="col-4 card">

            <div class="card-body"> <img src="data:image/jpeg;base64,{{ $archivo->imagen }}" width=100%>
            </div>
        </div>
        <div class="col-8 card">
            <div class="px-2 card-body">
                <div class="form-group">

                    <h3>{{ $producto->nombre }}</h3>

                    <div class="form-group mt-4">
                        <p> {{ $producto->descripcion }}</p>
                    </div>

                    <div class="form-group mt-4">
                        <p> {{ $producto->uso }}</p>
                    </div>

                    <div class="form-group mt-4">
                        <p> {{ $producto->precio }}</p>
                    </div>
                    <div class="form-group mt-4">
                        <p> {{ $producto->fecha }}</p>
                    </div>
                    <div class="form-group mt-4">
                        <p> {{ $producto->estado }}</p>
                    </div>
                    <div class="form-group mt-4">
                        <p> {{ $producto->foto }}</p>
                    </div>

                </div>
                <div class="form-group mt-4">
                    <label>Fecha</label>
                    {{ $producto->fecha }}
                </div>

                @if ($existe==1)


                <form method="post" action="/favoritos/borrar/{{$producto->id}}">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>
                    </button>

                </form>

                @else


                <form method="post" action="/favoritos/nuevo/{{$producto->id}}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>
                    </button>

                </form>
                @endif




            </div>

        </div>
    </div>

    <div class="row  px-4 py-3">
        <div class="col card">
            <div class="card-body">
                <form method="post" action="/mensaje/nuevo/{{$producto->id}}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre" id="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre"></input>
                    </div>
                    <div class="form-group">
                        <label for="textoMensajeContacto">Contacta con el vendedor</label>
                        <textarea class="form-control" id="textoMensajeContacto" name="textoMensajeContacto"
                            rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Enviar</button>

                </form>
            </div>
        </div>
    </div>
</div>



@endsection