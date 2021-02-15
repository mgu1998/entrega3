<?php

namespace App\Http\Controllers;

use App\Archivo;
use Illuminate\Http\Request;

class ArchivoController extends Controller {
    
    public function index()
    {
        $archivos = Archivo::all();
        return view('index')->with(['archivos' => $archivos]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $archivo = new Archivo($request->all());

        if($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $file = $request->file('imagen');
            $path = $file->getRealPath();
            $imagen = file_get_contents($path);
            $base64 = base64_encode($imagen);
            $nombre = $file->getClientOriginalName();
            $archivo->imagen1 = $base64;
            $r1=$file->storeAs('public/images', $nombre);
            $r2=$file->move('upload',$nombre);
            
        }
        dd([$r1,$r2]);
        $archivo->save();
        //return back();
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    $archivo= Archivo::find($id);
    return view('edit',['archivo'=>$archivo]);
    }

    public function update(Request $request, $id)
    {
    $archivo = Archivo::find($id);
    $archivo->fill($request->all());
    dd($archivo);
    $archivo->save();
    }

    public function destroy($id)
    {

    }
}