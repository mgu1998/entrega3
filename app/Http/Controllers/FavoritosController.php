<?php

namespace App\Http\Controllers;
use App\Favoritos;
use App\Producto;
use Illuminate\Http\Request;

class FavoritosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $favoritos=Favoritos::where('idUser', auth()->user()->id)->get(); 

        return view('favoritos.index')->with(['favoritos'=>$favoritos]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
       $data=$request->all();

       $data['idUser'] = auth()->user()->id;
       $data['idProducto'] = $id;
       Favoritos::create($data);

       return redirect()->route('favoritos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
    public function show(Favoritos $favoritos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
    public function edit(Favoritos $favoritos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favoritos $favoritos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $favoritos=Favoritos::where('idProducto',$id)->where('idUser', auth()->user()->id);
    $favoritos->delete();   
    return redirect()->route('productos');
}
}