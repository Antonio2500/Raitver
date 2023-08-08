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

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect('/');
        }
                        
            return redirect(route('login'));
        
    }

    //funcion para cerrar sesion
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

    


}
