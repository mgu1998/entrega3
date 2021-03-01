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
                        <p class="mb-0 font-weight-bold">Descripción</p>
                        <p> {{ $producto->descripcion }}</p>
                    </div>

                    <div class="form-group mt-4">
                        <p class="mb-0 font-weight-bold">Uso</p>
                        <p> {{ $producto->uso }}</p>
                    </div>

                    <div class="form-group mt-4">
                        <p class="mb-0 font-weight-bold">Precio</p>
                        <p> {{ $producto->precio }}€</p>
                    </div>
                    <div class="form-group mt-4">
                        <p class="mb-0 font-weight-bold">Fecha</p>
                        <p> {{ $producto->fecha }}</p>
                    </div>
                    <div class="form-group mt-4">
                        <p class="mb-0 font-weight-bold">Estado</p>
                        <p>
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


                </div>


                <div class="d-flex">
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
                    @if ($producto->idUser==auth()->user()->id)

                    <form method="post" action="/productos/borrar/{{$producto->id}}">
                        @csrf
                        <button type="submit" class="btn btn-danger ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                            </svg>
                        </button>

                    </form>



                    <form method="post" action="/productos/editar/{{$producto->id}}">
                        @csrf
                        <button type="submit" class="btn btn-success ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-cash-stack" viewBox="0 0 16 16">
                                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                <path
                                    d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
                            </svg>
                        </button>

                    </form>
                    @endif



                </div>

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
                        <input type="hidden" class="form-control" value="{{auth()->user()->email}}" id="email"
                            name="email"></input>

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