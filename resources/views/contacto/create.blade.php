@extends('layouts.app')

@section('content')
<form action="{{ url('/categoria/crear') }}" method="post" id="createCategoriaForm">
    @csrf
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

    <div class="card-body">

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" id="categoria" name="categoria" class="form-control">
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
</form>
@endsection