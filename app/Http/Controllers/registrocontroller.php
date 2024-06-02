<?php

namespace App\Http\Controllers;

use App\Http\Requests\registrorequest;
use App\Models\LoginModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class registrocontroller extends Controller
{
   public function show(){
      if(Auth::check()){
         return redirect('/home');
     }
     return view('auth.register');
     } 
   public function index(){
    $producto = User::all();
    return $producto;
   } 
   public function register(registrorequest $request){
    $user = User::create($request->validated());
    return redirect('/login')->with('success','perfect');
   }
}
