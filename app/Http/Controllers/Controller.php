<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;



class Controller extends BaseController
{

    public function registro()
    {
        return view('registro');
    }

    public function login(){
        return view('login');
    }

    public function perfil(){
        return view('perfil');
    }
    





    
    public function registrar(request $request)
    {

        //metodo para registrar usuarios con modelo User
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();


        return view('welcome');
    }


    //crea una funcion para iniciar sesion desde una bd
    public function loguearse(Request $request)
    {
        //metodo para iniciar sesion con modelo User
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // El usuario ha sido autenticado correctamente.

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
                        
            // return redirect(route('login'));
        
    }

    //funcion para cerrar sesion
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    //funcion para actualizar datos de usuario
    public function actualizar(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = 'images/FotoPerfiles/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $user->imagen = $destinationPath . $filename;
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password != null){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        //return 
        return redirect(route('perfil'));
    }

    


}
