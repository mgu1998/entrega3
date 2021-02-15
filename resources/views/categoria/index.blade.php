@extends('layouts.app')

@section('content')


<div class="container">
    
    
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ url('backend/producto/crear') }}" class="btn btn-primary">Subir producto</a>
            </div>
        </div>
    </div>
    </div>
    
        @foreach($productos as $producto)
        <div class="row">
      <div class=col>
        <div class="card mt-4 pt-4">
          <img src="{{ $producto->foto }}" class="card-img-top" alt="...">
          <div class="card-body">
                <h5 class="card-title">{{ $producto->nombre }}</h5>
                <p class="card-text">{{ $producto->descripcion }}</p>
                <p class="card-text">{{ $producto->uso }}</p>
                <p class="card-text">{{ $producto->precio }}</p>
                <p class="card-text">{{ $producto->fecha }}</p>
                <p class="card-text">{{ $producto->estado }}</p>
                
          


          </div>
          <div class="card-body">
                <a href="{{ url('/producto/' . $producto->producto_id) }}" class="card-link">Ver mas</a>
                <a href="{{ url('/productos/autor/' . $producto->autor_id) }}" class="card-link">Mas del autor</a>

          </div>
        </div>
          
      </div>
     
    </div>
           @endforeach 
   
    
    
    
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