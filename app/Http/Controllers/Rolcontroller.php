<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rolrequest;
use App\Models\Rolmodel;
use Illuminate\Http\Request;

class Rolcontroller extends Controller
{

    public function show(){
       
           return view('RolUser');
       }

    public function index(){
      $rol =  Rolmodel::all();
      return $rol;
    }
    public function store(Rolrequest $request){
      $rol = Rolmodel::create($request->all());
      if($rol == true){
        return redirect()->to('/register');
      }
    }
}
