<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favoritos extends Model
{
    protected $fillable=['id', 'idUser', 'idProducto'];
    
    
    public function producto(){

        return $this->belongsTo('App\Producto','idProducto');
        
    }

}