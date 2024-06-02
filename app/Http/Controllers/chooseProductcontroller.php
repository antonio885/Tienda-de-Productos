<?php

namespace App\Http\Controllers;

use App\Http\Requests\chooseProductrequest;
use App\Models\seleccionproducto;
use Illuminate\Http\Request;

class chooseProductcontroller extends Controller
{

 public function index(){
   $productosSeleccionados = SeleccionProducto::where('EstadoCompra', 'Seleccionado')->get();
   return $productosSeleccionados;
 }
 public function insertID($userIdPedChoose = null, chooseProductrequest $request){
   $idPedidoSelect = $request->input('idPedidoSelect');
   var_dump($idPedidoSelect);
   $query = seleccionproducto::query();
   if($userIdPedChoose !== null){
      $query->where('userIdPedChoose', $userIdPedChoose )->where('EstadoCompra', "Seleccionado");
   }
   $this->postid($query,$idPedidoSelect);
 }


 public function postid($query,$idPedidoSelect){
$query->update(['idPedidoSelect' => $idPedidoSelect , 'EstadoCompra'=>'Comprado']);
 }

 public function productoPedId($id = null){
   $query = seleccionproducto::query();
   if($id !== null){
     $query->where('idPedidoSelect', $id);
   }
   return $query->get();
   }

 public function store(chooseProductrequest $request){
  seleccionproducto::create($request->all());
 }

 public function update(Request $request, seleccionproducto $selectProduct){
    seleccionproducto::findOrFail($selectProduct->id)
    ->update($request->all());
 }

 public function destroy(seleccionproducto $selectproduct){
    $selectproduct = seleccionproducto::findOrFail($selectproduct->id);
    $selectproduct->delete();
 }
}
