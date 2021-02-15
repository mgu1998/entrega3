<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    
    function changePassword(Request $request) {
        $this->passwordValidate($request->all())->validate();
        //1º verificar que la clave anterior es correcta
        //2º encriptar la clave nueva y asignarla
        $user = auth()->user();
        //$user = Auth::user();
        if(Hash::check($request->oldpassword, $user->password)) {
            $user->password = Hash::make($request->clave);
            $user->save();
            return redirect('home')->with(['password' => true]);
        } else {
            return redirect('home')->with(['passworderror' => false])->withErrors(['passworderror' => 'No se ha podido cambiar la clave debido a que la clave anterior no es correcta. No funcion. Por qué?']);
        }
    }
    
    private function passwordValidate(array $data)
    {
        return Validator::make($data, [
            'oldpassword' => ['required', 'string'],
            'clave' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    
    function changeUser(Request $request) {
        $redirect = 'home';
        $this->userValidate($request->all())->validate();
        $user = auth()->user();
        $user->name = $request->name;
        if($user->email != $request->email) {
            $user->email = $request->email;
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
            session()->flash('login', true);
            Auth::logout();
            //\Illuminate\Support\Facades\Auth::logout();
            $redirect = 'login';
        }
        try {
            //dd([$user, $user->save()]);
            $user->save();
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['usererror' => '...']);
        }
        return redirect($redirect)->with(['user' => true]);
    }
    
    private function userValidate(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->user()->id],
        ]);
    }
}