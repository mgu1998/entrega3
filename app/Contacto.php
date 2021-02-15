<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable=['id','textoMensajeContacto', 'idusuario1', 'idusuario2','idproducto'];

}