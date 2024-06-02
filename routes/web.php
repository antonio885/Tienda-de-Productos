<?php

use App\Http\Controllers\chooseProductcontroller;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\pedidocontroller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\registrocontroller;
use App\Http\Controllers\Rolcontroller;
use App\Models\seleccionproducto;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});
// inventaryProduct
Route::post('/productosinventario', [homeController::class,'CreateProduct']);
Route::post('inventaryProduct', [homeController::class,'store']);
Route::get('viewInventary', [homeController::class, 'indexx']);


// ShopProduct
Route::get('shopInventary', [homeController::class, 'indexx']);
Route::get('getNombreProduct/{nomProducto}', [homeController::class, 'searchName']);


// chooseProduct
Route::post('selectProduct', [chooseProductcontroller::class, 'store']);
Route::post('selectProducts/{userIdPedChoose}', [chooseProductcontroller::class, 'insertID']);
Route::get('showselect',[chooseProductcontroller::class, 'index']);


// pedido
Route::get('viewcompras', [pedidocontroller::class, 'indexPed']);
Route::post('formpedido', [pedidocontroller::class, 'store']);
Route::get('storecodesearch/{codigoPed}',[pedidocontroller::class,'storecodesearch']);

//register
Route::post('/register', [registrocontroller::class, 'register']);

//login 
Route::post('/login',[loginController::class,'logins']);

//rol   
Route::post('/rolUser',[Rolcontroller::class, 'store']);
Route::get('/rolUserview',[Rolcontroller::class,'index']);

//compras
Route::get('pedidoProducto/{id}', [chooseProductcontroller::class, 'productoPedId']);
Route::put('UpdateEstado/{id}', [pedidocontroller::class,'update']);

//search product
Route::get('searchProduct/{idProducto}', [homeController::class, 'searchProduct']);
// Routes

Route::get('/productosinventario', function (){
    return view('productosEmpresa');
});

Route::get('/home', [homeController::class, 'index']);

Route::get('/formShop', function (){
    return view(('formShopping'));
});
Route::get('/register',[registrocontroller::class,'show']);

Route::get('/login',[loginController::class,'show']);

Route::get('/logout',[logoutController::class, 'logout']);

Route::get('/rolUser',[Rolcontroller::class,'show']);

Route::get('/PDF/{id}',[pedidocontroller::class,'PDF']);

Route::get('/compras', function (){
    return view(('viewCompras'));
});
Route::get('/PedShow', function (){
    return view(('showPedAdmin'));
});
Route::get('/productSearch', function (){
    return view(('productSearch'));
});