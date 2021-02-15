<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Favoritos;
use App\Categoria;
use App\Archivo;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::all();
        return view('productos.index')->with(['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::all();

        return view('productos.create')->with(['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        print_r($data);
        $archivo = new Archivo();
 //       $archivo->imagen=$data['imagen'];        
        if($request->file('imagen')) {
                    $file = $request->file('imagen');
                    $path = $file->getRealPath();
                    $imagen = file_get_contents($path);
                    $base64 = base64_encode($imagen);
                    $nombre = $file->getClientOriginalName();
                    $archivo->nombre=$nombre;
                    $archivo->imagen = $base64;
                    $r1=$file->storeAs('public/images', $nombre);
                    $r2=$file->move('upload',$nombre);          
                }
                    $archivo->save();
        
        $data['foto'] = $archivo->id;            
        Producto::create($data);

        return redirect()->route('productos');
    }


 

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        $existe=false;
        $favoritos=Favoritos::Where('idUser',auth()->user()->id)->get();
        $archivo=Archivo::find($producto->foto);
        if($favoritos){
            
            foreach($favoritos as $favorito){

                if($favorito->idProducto==$id){

                    $existe=true;               
            
                }


                else
                {
                    $existe=false;
                }
            }

        }
        
        return view('productos.show')->with(['producto' =>$producto, 'existe'=>$existe, 'archivo'=>$archivo]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}