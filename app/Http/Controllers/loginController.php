<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Models\LoginModel;
use App\Models\Rolmodel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class loginController extends Controller
{
    public function show(){
        if(Auth::check()){
           return redirect('/home');
       };
       return view('auth.login');
       } 
    public function index(){
        $producto = User::all();
        return $producto;
    }
    public function logins(loginRequest $request){
        $credentials = $request->getCredentials();
        if(!Auth::validate($credentials)){
            return redirect()->to('/login')->with('error', 'el usuario o la contraseña son incorrecta');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

         Auth::login($user);
        
        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user){
        $rol = Rolmodel::where('idRol', $user->id_Rol)->first();
          
            if($rol->nombreRol === 'cliente'){
                return redirect('/home');
            
            }elseif($rol->nombreRol === 'admin'){
                var_dump($rol);
                return redirect('/productosinventario'); 
            }
        
       
    }
}
