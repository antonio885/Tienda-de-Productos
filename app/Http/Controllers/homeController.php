<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Http\Requests\productrequest;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function searchProduct($idProducto = null){
        $query =  producto::query();
        if($idProducto !== null){
          $query->where('idProducto', $idProducto);
        }
        return $query->get();
      }
      
public function searchName($nomProducto = null){
$querry = producto::query();
if($nomProducto !== null){
    $querry->where('nomProducto',$nomProducto);
}
return $querry->get();
}

public function index(){
    return view('home.index');
}

public function indexx(){
    $producto = producto::all();
    return $producto;
}
public function CreateProduct(productrequest $request){
        $product = new producto();

    if($request->hasFile('imagen')){
        $file =  $request->file('imagen');
        $destinationPath = 'img/imagenesproductos/';
        $filename = time() . "-" .  $file->getClientOriginalName();
        $uploadSuccess= $request->file('imagen')->move($destinationPath, $filename);
        $product->imagen =  $destinationPath . $filename;
        
    
    }
    $product->nomProducto  =  $request->input('nombre');
    $product->PrecioProduct =  $request->input('precio');
    $product->descripcionProduct=  $request->input('descripcion');
    $product->gamaProducto =  $request->input('categoria');
    $product->cantidadProduct =  $request->input('cantidad');
    $product->save();
    return redirect('/productosinventario');
}
public function store(productrequest $request){
 producto::create($request->all());
   
}
public function update(Request $request, producto $producto)
{
    producto::findOrFail($producto->id)
    ->update($request->all());
}
public function destroy(producto $Producto){
    $Producto = producto::findOrFail($Producto->id);
    $Producto->delete();
}
}
