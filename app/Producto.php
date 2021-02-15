<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable=['id', 'idUser', 'idcategoria', 'nombre', 'descripcion', 'uso', 'precio', 'fecha', 'estado','foto'];


    public function archivo(){

    return $this->belongsTo('App\Archivo','foto');
    
}

public function vendedor(){

    return $this->belongsTo('App\Models\User','idUser');
    
}
}