<?php

namespace App\Http\Controllers;

use App\Http\Requests\facturarequest;
use App\Http\Requests\ifacturarequest;
use App\Http\Requests\pedidorequest;
use App\Http\Requests\productrequest;
use App\Models\facturamodel;
use App\Models\ifacturamodel;
use App\Models\pedidomodel;
use App\Models\producto;
use App\Models\seleccionproducto;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class pedidocontroller extends Controller
{

    public function index()
    {
        $id = Auth::id();
        $producto = pedidomodel::where('idPedCustomer', $id)->get();
       
        return $producto;
        
    }
    public function indexPed(){
        $ped = pedidomodel::all();
        return $ped;
    }

    public function store(pedidorequest $request)
    {
    pedidomodel::create($request->all());
    return redirect('/home');

    }
    public function storecodesearch($codigoPed = null)
    {
        $query = pedidomodel::query();
        if ($codigoPed !== null) {
            $query->where('codigoPed', $codigoPed);
        }
        return $query->get();
    }

    public function update(productrequest $request, ifacturarequest $facturarequest, $id = null)
    {
        $selectProduct = $request->input('estadoPedido');
        if ($id !== null) {
            $pedido = pedidomodel::findOrFail($id);
            $pedido->estadoPedido = $selectProduct;
            $pedido->save();
            if ($selectProduct == 'Enviado') {
                $this->UpdateEstado($id);
                $this->addIfactura($id,$facturarequest);
            }
        }
    }
    public function updateEstado($id)
    {
        $choosePed = seleccionproducto::where('idPedidoSelect', $id)->get();
        foreach ($choosePed as $producto) {
            $producto->EstadoCompra = 'descontado';
            $producto->save();
        }
        $this->discountProduct($id);
        
    }

    public function discountProduct($id)
    {
        $select = seleccionproducto::where('idPedidoSelect', $id)->get();
        foreach ($select as $element) {
            $quantity = $element->cantidad;
            $product = producto::Where(['nomProducto' => $element->nombrePro])->get();
            $this->operationdiscount($quantity, $product);
        }
    }

    public function operationdiscount($quantity, $product)
    {
        foreach ($product as $elements) {
            $productId = $elements->idProducto;
            $quantityProduct = $elements->cantidadProduct;
            $discount = $quantityProduct - $quantity;
            var_dump($discount);
            $this->UpdateDiscount($productId, $discount);
        }
    }

    public function UpdateDiscount($productId, $discount)
    {
        $product = producto::where(['idProducto' => $productId]);

        $product->update(['cantidadProduct' => $discount]);
       
    }

    public function addIfactura($id,$facturarequest)
    {
        $ped = pedidomodel::where('id', $id)->first();
       
        if($ped){
            $pedid = $ped->id;
            $quality = ifacturamodel::where('pedidos_id',$pedid)->first();
        
            if ($quality) {
               
                $quality->cantIfactura += 1;
                
                $quality->save();
            }else{
                $factura = new ifacturamodel();
                $factura->pedidos_id = $ped->id;
                $factura->cantIfactura = 1;
                $factura->save();
            }
        }
       
     

    }



    public function PDF(facturarequest $request, $id = null)
    {
        if ($id !== null) {
            $pedido = pedidomodel::where('id', $id)->get();
            $product = seleccionproducto::where('idPedidoSelect', $id)->get();

            // $pdf = PDF::loadView('generatePDF', ['pedido'=> $pedido, 'product'=> $product]);
            // return $pdf->stream();
            $this->insertFactura($id, $request);
            $pdf = PDF::loadView('generatePDF', ['pedido'=> $pedido, 'product'=> $product]);
            return $pdf->stream();
            // return view('generatePDF', ['pedido' => $pedido, 'product' => $product]);
            
        }
    }
    public function insertFactura($id, $request)
    {
        $ped = pedidomodel::where('id', $id)->first();
        $idped = $ped->id;
        $users = $ped->idPedCustomer;
        if ($users) {
            $customer = User::where('id', $users);
            
          

          $factura = new facturamodel();
          $factura->idClienteFactura = $users;
          $factura->fechaFactura = Carbon::now();
          $factura->save();

          if($factura){
            $idfactura = $factura->idFactura;
            
             ifacturamodel::where('pedidos_id', $idped)->
            update(['idFacturaIfactura'=> $idfactura]);
          }
          
              
          
            
            // $factura = 
        }
    }



    public function destroy(pedidomodel $pedido)
    {
        $pedido = pedidomodel::findOrFail($pedido->id);
        $pedido->delete();
    }
}
