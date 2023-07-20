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


    public function index()
    {
        return view('login');
    }

    public function login(){
        return view('login');
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








    // public function login()
    // {
    //     if (Auth::check()) {
    //         if (Auth::user()->rol == 'admin') {
    //             return redirect()->route('General.Users');
    //         } else if (Auth::user()->rol == 'auxiliar') {
    //             return redirect()->route('General.Users');
    //         } else if (Auth::user()->rol == 'cliente') {
    //             return redirect()->route('General.Users');
    //         }
    //     } else {
    //         return view('login');
    //     }
    // }

    


}
