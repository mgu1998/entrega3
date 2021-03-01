<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Producto;
use Illuminate\Http\Request;
use Mail;
class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $producto=Producto::find($id);
        $data=$request->all();
        $email_comprador=auth()->user()->email;
        //comprador
        $data['idusuario1']=auth()->user()->id;
        //vendedor
        $data['idusuario2']=$producto->vendedor->id;
        $data['idproducto']=$id;
        

        $email_vendedor=$producto->vendedor->email;
       
       
        $subject = $data['textoMensajeContacto'];
        $for = $producto->vendedor->email;
        Mail::send('email',$request->all(), function($msj) use($subject,$for){
            $msj->from(auth()->user()->email, auth()->user()->name);
            $msj->subject($subject);
            $msj->to($for);
        });
        Contacto::create($data);

        return redirect()->route('productos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}