@extends('layouts.app')

@section('content')
<form action="{{ url('/producto/crear') }}" method="post" id="createProductoForm" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <input type="hidden" name="idUser" value="{{ Auth::id() }}">


    <div class="card-body">

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control">
        </div>

        <div class="form-group">
            <label for="descripcion">descripcion</label>
            <textarea type="text" id="descripcion" name="descripcion" class="form-control" rows="5"></textarea>

        </div>

        <div class="form-group">
            <label for="uso">Uso</label>
            <input type="text" id="uso" name="uso" class="form-control">
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" id="precio" name="precio" class="form-control">
        </div>

        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" class="form-control">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-select" id="estado" name="estado" aria-label="Como se encruentra">
                <option value="1">venta</option>
                <option value="2">vendido</option>
                <option value="3">retirado</option>
                <option value="4">censurado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="idcategoria">Categoria</label>
            <select class="form-select" id="idcategoria" name="idcategoria" aria-label="Como se encruentra">
                @foreach($categorias as $categoria)
                <option value="{{$categoria['id']}}">{{$categoria['categoria']}}</option>

                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="file" name="imagen" id="imagen" />



        </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>

@endsection